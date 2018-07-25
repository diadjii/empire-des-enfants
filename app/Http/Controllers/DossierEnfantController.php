<?php

namespace App\Http\Controllers;

use PDF;

use App\Entities\Parents;
use App\Entities\DossierEnfant;

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

        return view("back.dossierenfant",compact("login"));
    }
    
    public function store(CreateDossierEnfantFormRequest $request){
        
        $dossierEnfant = $this->createEntityDossierEnfant($request); 
        
        try {
            //enregistrement dossier enfant
            $this->em->persist($dossierEnfant);
            $this->em->flush();
            
            $idEnfant   = $dossierEnfant->getIdDossierEnfant();
            $directory  = $idEnfant;
           
            Storage::makeDirectory($directory);
            
            $request->file('photoEnfant')->storeAs($directory,$dossierEnfant->getPrenomEnfant().'-'.$dossierEnfant->getNomEnfant().'-'.$idEnfant);
            
            $infoParent = $this->createEntityParents($request,$idEnfant);
           
            $this->em->persist($infoParent);
            $this->em->flush();

            $info = [
                "typeAction"    => "Creation Dossier Enfant",
                "userId"        => session("id"),
              ];
              
            EventStoreController::store($this->em,$info);
            
            return redirect("/Administration/liste-des-dossier-enfants");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function listeDossierEnfant(){
        $dossierRep = $this->em->getRepository(DossierEnfant::class);
        $liste      = $dossierRep->findAll();
        $login      = session('login');
        
        return view("back.liste-dossier-enfant",compact('liste','login'));
    }
    
    //voir les details du dossier d'un enfant
    public function show($id){
        $dossierRep     = $this->em->getRepository(DossierEnfant::class);
        $parentRep      = $this->em->getRepository(Parents::class);

        $dossierEnfant  = $dossierRep->findByIdDossierEnfant($id);
        $parentEnfant   = $parentRep->findByIdEnfant($dossierEnfant[0]->getIdDossierEnfant());
        
        $directory      = $dossierEnfant[0]->getPrenomEnfant().'-'.$dossierEnfant[0]->getNomEnfant().'-'.$dossierEnfant[0]->getIdDossierEnfant();
         
        $img            = Storage::url("document/".$dossierEnfant[0]->getIdDossierEnfant()."/".$directory);
       
        $enfant         = $dossierEnfant[0];
        $parent         = null;
        
        try{
            $parent     = $parentEnfant[0];
        }catch(\ErrorException $e){
            $parent     = new Parents();
        }
        
        $login = session('login');

        return view("back.detail-dossier-enfant",compact("enfant","parent","login","img"));
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

        // if(\File::isDirectory($directory)){
        //     //$img = Storage::url("document/".$directory."/".$directory);
        //     $request->file('photoEnfant')->storeAs($directory,$prenomEnfant.'-'.$nomEnfant.'-'.$id);
        // }else{
        //     Storage::makeDirectory($directory);
        //     if($request->file('photoEnfant') != null){
        //         $request->file('photoEnfant')->storeAs($directory,$prenomEnfant.'-'.$nomEnfant.'-'.$id);
        //     }
        // }    

        // print_r($ext);
        // die();

        $message    = "Document ajouté avec succes !!";

        $info = [
            "typeAction"    => "Ajout de  Document dans le dossier de ".$idEnfant,
            "userId"        => session("id"),
          ];
          
        EventStoreController::store($this->em,$info);
        return redirect()->back()->withErrors([$message]);
    }
    
    public function getDossierTribunal($nom){
        // $ok=false;
        // $pat = null;
        // $files = Storage::allFiles('dossier-juridique');
        // foreach ($files as $value) {
            
        //     $t = explode("/",$value)[1];
        //     $o =  explode(".",$t)[0];
            
        //     if($o ===$nom){
        //         $pat =  $value;
        //         $ok = true;
        //     }
            
        // }
        
        // if($ok){
        //     return Storage::download( $pat);
        // }else{
        //     $message = "Le dossier de l'enfant ne contient pas encore de dossier juridique";
        //     return redirect()->back()->withErrors([$message]);
        // }
        $login = session('login');
        return view("back.zone-telechargement",compact("login"));
    }
    
    public function update(Request $request, $id){
        $nomEnfant      = $request->get('nom');
        $prenomEnfant   = $request->get('prenom');
        $origine        = $request->get('origine');
        
        $dateNaissance  = $request->get('dateNaissance');
        $lieuNaissance  = $request->get('lieuNaissance');
        $adresse        = $request->get('adresse');
        
        $description    = $request->get('description');
        $profilEnfant   = $request->get('profilEnfant');
        $statu          = $request->get('statu');

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

        $dossierEnfant[0]->setDateNaissanceEnfant($dateNaissance);
        $dossierEnfant[0]->setLieuNaissance($lieuNaissance);
        $dossierEnfant[0]->setAdresse($adresse);
        
        $dossierEnfant[0]->setStatutEnfant($statu);
        $dossierEnfant[0]->setAgeEnfant(12);
        $dossierEnfant[0]->setDescription($description);
        $dossierEnfant[0]->setProfil($profilEnfant);
        
        $this->em->flush();

        $parentRep      = $this->em->getRepository(Parents::class);
        $infoParent     = $parentRep->findByIdEnfant($id);


        $prenomPere     = $request->get('prenomPere');
        $prenomMere     = $request->get('prenomMere');
        $nomMere        = $request->get('nomMere');
        $numTel         = $request->get('numTel');
        
        if(count($infoParent) < 1 ){
            $parent     = $this->createEntityParents($request,$id);

            $this->em->persist($parent);
            $this->em->flush();
        }else{

            $infoParent[0]->setPrenomPere($prenomPere);
            $infoParent[0]->setNomMere($nomMere);
            $infoParent[0]->setPrenomMere($prenomMere);
            $infoParent[0]->setNumTel($numTel);
            $infoParent[0]->setIdEnfant($id);

            $this->em->flush();
        }
        
        $directory = $id;

        if(\File::isDirectory($directory)){
            //$img = Storage::url("document/".$directory."/".$directory);
            $request->file('photoEnfant')->storeAs($directory,$prenomEnfant.'-'.$nomEnfant.'-'.$id);
        }else{
            Storage::makeDirectory($directory);
            if($request->file('photoEnfant') != null){
                $request->file('photoEnfant')->storeAs($directory,$prenomEnfant.'-'.$nomEnfant.'-'.$id);
            }
        }    
        $info = [
            "typeAction"    => "Modification Dossier Enfant",
            "userId"        => session("id"),
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
        $dateNaissance  = $request->get('dateNaissance');
        $lieuNaissance  = $request->get('lieuNaissance');
        $adresse        = $request->get('adresse');
        $description    = $request->get('description');
        $profilEnfant   = $request->get('profilEnfant');
        $idEnfant       = $request->get('idEnfant');  

        $dossierEnfant  = new DossierEnfant();
        
        $dossierEnfant->setIdentifiantEnfant($idEnfant);
        $dossierEnfant->setNomEnfant($nomEnfant);
        $dossierEnfant->setPrenomEnfant($prenomEnfant);
        $dossierEnfant->setOrigineEnfant($origine);
        $dossierEnfant->setDateNaissanceEnfant($dateNaissance);
        $dossierEnfant->setLieuNaissance($lieuNaissance);
        $dossierEnfant->setAdresse($adresse);
        $dossierEnfant->setAgeEnfant(12);
        $dossierEnfant->setDescription($description);
        $dossierEnfant->setProfil($profilEnfant);
        $dossierEnfant->setDateAjoutDossierEnfant("2018-06-28");
        
        return $dossierEnfant;
    }
    
    /**
    * @param Request var prend l'objet request en parametre et retourne une 
    * instance de parents 
    */
    public function createEntityParents($request,$idEnfant){
        $prenomPere     = $request->get('prenomPere');
        $prenomMere     = $request->get('prenomMere');
        $nomMere        = $request->get('nomMere');
        $numTel         = $request->get('numTel');
        
        $infoParent     = new Parents();
        
        $infoParent->setPrenomPere($prenomPere);
        $infoParent->setNomMere($nomMere);
        $infoParent->setPrenomMere($prenomMere);
        $infoParent->setNumTel($numTel);
        $infoParent->setIdEnfant($idEnfant);
        
        return $infoParent;
    }

    public function viewAllDocuments($idDossier){
        $documents = Storage::allFiles($idDossier);
        $allDocuments = null;
        $i = 0;
        
        foreach ($documents as $value) {
            # code...
            $d = Storage::url("document/".$value);
            $ext =explode('.',$d);
            $nom = explode('/',$ext[0]);
            print_r($nom[4]);
            $type = "img";

            $path = $nom[3]."/".$nom[4];
            if(isset($ext[1])){
                $type ="pdf";
            }

            $allDocuments[$i] = [
                "type" => $type,
                "nom"  => $nom[4],
                "p"    => $path,
                "document" => $d
            ];
            $i++;
        }
    
        $login = session('login');

        
        return view('back.zone-telechargement', compact('allDocuments','login','idDossier'));
    }

    public function downloadDocument(Request $request){
        $n = $request->get("nomDocument");
        
        // $d = Storage::url("document/24/Designsanstitre.pdf");
        return Storage::download($n);
    }
}
