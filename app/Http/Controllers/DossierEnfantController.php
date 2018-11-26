<?php

namespace App\Http\Controllers;

use PDF;

use App\Entities\Parents;
use App\Entities\DossierEnfant;
use App\Entities\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DossierEnfantController;

use App\Http\Requests\CreateDossierEnfantFormRequest;

use Illuminate\Http\Request;
use Illuminate\Http\File;

use Illuminate\Support\Facades\Storage;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

class DossierEnfantController extends Controller{
    private $em;
    
    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }
    
    public function index(){
        $login = session('login');

        return view("new.create-dossier-enfant",compact("login"));
    }
    
    public function store(CreateDossierEnfantFormRequest $request){
        $dossierEnfant = $this->createEntityDossierEnfant($request); 
        $c = $dossierEnfant->getIdentifiantEnfant();
        if($this->existCodeEnfant($c)){
           return redirect()->back()->with("error","Ce code est deja attribué à un enfant.Veillez choisir un autre !")->withInput();
        }else{
            $this->em->persist($dossierEnfant);
            $this->em->flush();
            
            echo "ok"; 
            try{

                $idEnfant   = $dossierEnfant->getIdDossierEnfant();
                $directory  = $idEnfant;
                
                Storage::makeDirectory($directory);
                
                $extension  = $request->file('photoEnfant')->getMimeType(); 
                $ext        = explode('/',$extension)[1];
                
                $request->file('photoEnfant')->storeAs($directory,'profil-'.$idEnfant);
            }catch(\ErrorException $e){
                echo $e->getMessage();
            }
            
            $infoParent = $this->createEntityParents($request,$dossierEnfant);
           
            $this->em->persist($infoParent);
            $this->em->flush();

            $idCurrentUser  = session('id');
            $u              = $this->em->getRepository(User::class);
            $currentUser    = $u->findById($idCurrentUser);
            
            $info = [
                "typeAction"    => "Creation Dossier Enfant",
                "userId"        => session("id"),
                "typeUser"      => session('typeCurrentUser'),
                "description"   => "Creation dossier de ".$dossierEnfant->getPrenomEnfant()." ".$dossierEnfant->getNomEnfant()." par ".$currentUser[0]->getPrenom()." ".$currentUser[0]->getNom()
            ];
            
            EventStoreController::store($this->em,$info);
            
            return redirect("/liste-dossier-des-enfants");
        }
    }
    
    public function listeDossierEnfant(){
        $dossierRep = $this->em->getRepository(DossierEnfant::class);
        $liste      = $dossierRep->findAll();
        $login      = session('login');
        
        return view("new.dossier-enfants",compact('liste','login'));
    }
    
    //voir les details du dossier d'un enfant
    public function show($id){
        $dossierRep     = $this->em->getRepository(DossierEnfant::class);
        $parentRep      = $this->em->getRepository(Parents::class);

        $dossierEnfant  = $dossierRep->findByIdDossierEnfant($id);
        $parentEnfant   = $parentRep->findByIdEnfant($dossierEnfant[0]->getIdDossierEnfant());
        $directory      = $dossierEnfant[0]->getPrenomEnfant().'-'.$dossierEnfant[0]->getNomEnfant().'-'.$dossierEnfant[0]->getIdDossierEnfant();
        $img            = Storage::url("document/".$dossierEnfant[0]->getIdDossierEnfant()."/".$directory);
        $statu          = $dossierEnfant[0]->getStatutEnfant();  

        $enfantPresent      = "";
        $enfantPresAPartir  = "";
        $enfantParti        = "";
        $disabled           = "";

        switch ($statu) {
            case 'Enfant Présent':
                $enfantPresent      = "selected";
                break;
            case 'Enfant près à Partir':
                $enfantPresAPartir  = "selected";
                break;
            case 'Enfant Parti':
                $enfantParti        = "selected";
                break;
            default:
                $enfantPresent      = "selected";
                break;
        }   

        if(session("typeCurrentUser") != "admin" && session("typeCurrentUser") != "encadreur"){
            $disabled = "disabled";
        }

        $enfant = $dossierEnfant[0];
        $parent = null;
        
        try{
            $parent     = $parentEnfant[0];
        }catch(\ErrorException $e){
            $parent     = new Parents();
        }
        
        $login = session('login');
        $profil = $enfant->getProfil(); 

        $evt = "";
        $ep  = "";
        $erf = "";

        switch ($profil) {
            case 'evt':
                $evt = 'checked';
                break;
            case 'ep':
                $ep = 'checked';
                break;
            case 'erf':
                $erf = 'checked';   
                    break;
            default:
                break;
        }
        return view("new.edit-dossier-enfant",compact("enfant","parent","login","disabled","img","evt","ep","erf","enfantPresent","enfantPresAPartir","enfantParti"));
    }
    

    public function  dossierJuridiquePDF($id){
        $dossierRep     = $this->em->getRepository(DossierEnfant::class);
        $dossierEnfant  = $dossierRep->findByIdDossierEnfant($id);
        
        $parentRep      = $this->em->getRepository(Parents::class);
        $parentEnfant   = $parentRep->findById($dossierEnfant[0]->getIdDossierEnfant());
        
        $enfant         = $dossierEnfant[0];
        $parent         = null;
        
        try{
            $parent     = $parentEnfant[0];
        }catch(\ErrorException $e){
            $parent     = new Parents();
        }
        
        $pdf = PDF::loadView('back.dossier-juridique-template-pdf', compact("login", "dossier", "enfant", "parent"));
        
        return $pdf->download($enfant->getNomEnfant().'-'.$enfant->getPrenomEnfant().'.pdf');
       
    }
    
    
    public function addDocument(Request $request){
        $nom        = $request->get("nomDocument");
        $idEnfant   = $request->get("id");

        $extension  = $request->file('doc')->getMimeType(); 
        $ext        = explode('/',$extension)[1];
        
        $request->file('doc')->storeAs($idEnfant,$nom.'.'.$ext);
    
        $message    = "Document ajouté avec succes !!";
        
        $idCurrentUser  = session('id');
        $u              = $this->em->getRepository(User::class);
        $currentUser    = $u->findById($idCurrentUser);

        $info = [
            "typeAction"    => "Ajout de  Document ",
            "userId"        => session("id"),
            "typeUser"      => session('typeCurrentUser'),
            "description"   => "Ajout du document ".$nom." par ".$currentUser[0]->getPrenom()." ".$currentUser[0]->getNom()
          ];
          
        EventStoreController::store($this->em,$info);

        return redirect()->back()->withErrors([$message]);
    }
    
    public function update(Request $request, $id){
        $nomEnfant      = $request->get('nom');
        $prenomEnfant   = $request->get('prenom');
        $origine        = $request->get('origine');
        
        $ageEnfant      = $request->get('age');
        $lieuNaissance  = $request->get('lieuNaissance');
        $adresse        = $request->get('adresse');
        
        $description    = $request->get('description');
        $profilEnfant   = $request->get('profilEnfant');
        $statu          = $request->get('statu');

        $dateEntree     = $request->get("dateEntree");
        $dateSortie     = $request->get("dateSortie");
        $codeEnfant     = $request->get("codeEnfant");
        $motifSortie    = $request->get("motifSortie");

        switch ($statu) {
            case '0':
                $statu  = 'Enfant Présent';
                break;
            case '1':
                $statu  = 'Enfant près à Partir';
                break;
            case '2':
                $statu  = 'Enfant Parti';
                break;
            default:
                $statu  = 'Enfant Présent';
                break;
        }

        $dossierRep     = $this->em->getRepository(DossierEnfant::class);
        $dossierEnfant  = $dossierRep->findByIdDossierEnfant($id);
        
        
        $dossierEnfant[0]->setNomEnfant($nomEnfant);
        $dossierEnfant[0]->setPrenomEnfant($prenomEnfant);
        $dossierEnfant[0]->setOrigineEnfant($origine);

        $dossierEnfant[0]->setLieuNaissance($lieuNaissance);
        $dossierEnfant[0]->setAdresse($adresse);
        $dossierEnfant[0]->setStatutEnfant($statu);

        $dossierEnfant[0]->setAgeEnfant($ageEnfant);
        $dossierEnfant[0]->setDescription($description);
        $dossierEnfant[0]->setProfil($profilEnfant);

        $dossierEnfant[0]->setDateEntree($dateEntree);
        $dossierEnfant[0]->setDateSortie($dateSortie);
        $dossierEnfant[0]->setIdentifiantEnfant($codeEnfant);
        $dossierEnfant[0]->setMotifSortie($motifSortie);
        
        $this->em->flush();

        $parentRep      = $this->em->getRepository(Parents::class);
        $infoParent     = $parentRep->findByIdEnfant($dossierEnfant[0]);


        $prenomPere     = $request->get('prenomPere');
        $prenomMere     = $request->get('prenomMere');
        $nomMere        = $request->get('nomMere');
        $numTel         = $request->get('numTel');
        
        if(count($infoParent) < 1 ){
            $parent     = $this->createEntityParents($request,$dossierEnfant[0]);

            $this->em->persist($parent);
            $this->em->flush();
        }else{

            $infoParent[0]->setPrenomPere($prenomPere);
            $infoParent[0]->setNomMere($nomMere);
            $infoParent[0]->setPrenomMere($prenomMere);
            $infoParent[0]->setNumTel($numTel);
            $infoParent[0]->setIdEnfant($dossierEnfant[0]);

            $this->em->flush();
        }
        
        $directory = $id;

        if(\File::isDirectory($directory)){
            $request->file('photoEnfant')->storeAs($directory,$prenomEnfant.'-'.$nomEnfant.'-'.$id);
        }else{
            Storage::makeDirectory($directory);
            if($request->file('photoEnfant') != null){
                $request->file('photoEnfant')->storeAs($directory,$prenomEnfant.'-'.$nomEnfant.'-'.$id);
            }
        }    

        $idCurrentUser  = session('id');
        $u              = $this->em->getRepository(User::class);
        $currentUser    = $u->findById($idCurrentUser);

        $info = [
            "typeAction"    => "Modification Dossier Enfant",
            "userId"        => session("id"),
            "typeUser"      => session('typeCurrentUser'),
            "description"   => "Modification du dossier de  ".$nomEnfant." ".$prenomEnfant." par ".$currentUser[0]->getPrenom()." ".$currentUser[0]->getNom()
          ];
          
        EventStoreController::store($this->em,$info);
        return redirect()->back();
    }
    
    /**
    * @param Request var prend l'objet request en parametre et retourne une 
    * instance de dossier enfant
    */
    public function createEntityDossierEnfant($request){
        $nomEnfant      = $request->get('nom');
        $prenomEnfant   = $request->get('prenom');

        $origine        = $request->get('origine');
        $ageEnfant      = $request->get('age');

        $lieuNaissance  = $request->get('lieuNaissance');
        $adresse        = $request->get('adresse');

        $description    = $request->get('description');
        $profilEnfant   = $request->get('profilEnfant');
        
        $idEnfant       = $request->get('idEnfant');  
        $dateEntree     = $request->get("dateEntree");

        $dossierEnfant  = new DossierEnfant();
        
        $dossierEnfant->setIdentifiantEnfant($idEnfant);
        $dossierEnfant->setNomEnfant($nomEnfant);
        $dossierEnfant->setPrenomEnfant($prenomEnfant);
        $dossierEnfant->setOrigineEnfant($origine);
        $dossierEnfant->setLieuNaissance($lieuNaissance);
        $dossierEnfant->setAdresse($adresse);
        $dossierEnfant->setAgeEnfant($ageEnfant);
        $dossierEnfant->setDescription($description);
        $dossierEnfant->setProfil($profilEnfant);
        $dossierEnfant->setDateEntree($dateEntree);
        $dossierEnfant->setDateAjoutDossierEnfant(" ");
        
        return $dossierEnfant;
    }
    
    /**
    * @param Request var prend l'objet request en parametre et retourne une 
    * instance de parents 
    */
    public function createEntityParents($request,$dossierEnfant){
        $prenomPere     = $request->get('prenomPere');
        $prenomMere     = $request->get('prenomMere');
        $nomMere        = $request->get('nomMere');
        $numTel         = $request->get('numTel');
        
        $infoParent     = new Parents();
        
        $infoParent->setPrenomPere($prenomPere);
        $infoParent->setNomMere($nomMere);
        $infoParent->setPrenomMere($prenomMere);
        $infoParent->setNumTel($numTel);
        $infoParent->setIdEnfant($dossierEnfant);
        
        return $infoParent;
    }

    public function viewAllDocuments($idDossier){
        $documents = Storage::allFiles($idDossier);
        $allDocuments = null;
        $i = 0;
        
        foreach ($documents as $value) {
            # code...
            $document      = Storage::url("document/".$value);
            $ext    = explode('.',$document);
            $nom    = explode('/',$ext[0]);
            
            $type   = "img";

            $path = $nom[3]."/".$nom[4];

            if(isset($ext[1]) && $ext[1] == "pdf"){
                $type ="pdf";
            }

            $p = "";

            try{
                $p =  $path.".".$ext[1];

            }catch(\Exception $e){
                $p = "";
            }

            $allDocuments[$i] = [
                "type" => $type,
                "nom"  => $nom[4],
                "p"    =>$p,
                "document" => $document
            ];
            $i++;
        }
        
      
        $login = session('login');
        
        return view('new.zone-telechargement', compact('allDocuments','login','idDossier'));
    }

    public function downloadDocument(Request $request){
        $n = $request->get("nomDocument");
        
        return Storage::download($n);
    }


    public function existCodeEnfant($codeEnfant){
        $dossierRep     = $this->em->getRepository(DossierEnfant::class);
        $code= null;
        $code           = $dossierRep->findByIdentifiantEnfant($codeEnfant);  
      
        if($code == null){
            return false;
        }else{
            return true;
        }
    }
}
