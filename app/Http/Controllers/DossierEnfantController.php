<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDossierEnfantFormRequest;
use App\Entities\DossierEnfant;
use App\Entities\Parents;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use PDF;

class DossierEnfantController extends Controller
{
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    public function index()
    {
        $login = session('login');
        return view("back.dossierenfant",compact("login"));
    }


    public function create()
    {
        //
    }


    public function store(CreateDossierEnfantFormRequest $request)
    {
        $nomEnfant      = $request->get('nom');
        $prenomEnfant   = $request->get('prenom');
        $origine        = $request->get('origine');

        $dateNaissance  = $request->get('dateNaissance');
        $lieuNaissance  = $request->get('lieuNaissance');
        $adresse        = $request->get('adresse');

        $description    = $request->get('description');
        $profilEnfant   = $request->get('profilEnfant');

        $prenomPere     = $request->get('prenomPere');
        $prenomMere     = $request->get('prenomMere');
        $nomMere        = $request->get('nomMere');
        $numTel         = $request->get('numTel');

        // $u = $this->em->getRepository(DossierEnfant::class);

        $dossierEnfant = new DossierEnfant();

        $dossierEnfant->setNomEnfant($nomEnfant);
        $dossierEnfant->setPrenomEnfant($prenomEnfant);
        $dossierEnfant->setOrigineEnfant($origine);
        $dossierEnfant->setDateNaissanceEnfant($dateNaissance);
        $dossierEnfant->setLieuNaissance($lieuNaissance);
        $dossierEnfant->setAdresse($adresse); $dossierRep = $this->em->getRepository(DossierEnfant::class);


        $dossierEnfant->setPhotoEnfant("test");
        $dossierEnfant->setAgeEnfant(12);
        $dossierEnfant->setDescription($description);
        $dossierEnfant->setProfil($profilEnfant);
        $dossierEnfant->setDateAjoutDossierEnfant("2018-06-28");


        try {
            //enregistrement dossier enfant
            $this->em->persist($dossierEnfant);
            $this->em->flush();

            $idEnfant = $dossierEnfant->getIdDossierEnfant();
            $path =  $request->file('photoEnfant')->storeAs('',$prenomEnfant.'-'.$nomEnfant.'-'.$idEnfant);

            $infoParent = new Parents();

            $infoParent->setPrenomPere($prenomPere);
            $infoParent->setNomMere($nomMere);
            $infoParent->setPrenomMere($prenomMere);
            $infoParent->setNumTel($numTel);
            $infoParent->setIdEnfant($idEnfant);

            $this->em->persist($infoParent);
            $this->em->flush();


            return redirect("/administration/DossierDesEnfants");
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function listeDossierEnfant(){
        $dossierRep = $this->em->getRepository(DossierEnfant::class);
        $liste = $dossierRep->findAll();
        $login = session('login');


        return view("back.liste-dossier-enfant",compact('liste','login'));
    }

    //voir les details du dossier d'un enfant
    public function show($id)
    {
        $dossierRep     = $this->em->getRepository(DossierEnfant::class);
        $dossierEnfant  = $dossierRep->findByIdDossierEnfant($id);

        $parentRep      = $this->em->getRepository(Parents::class);
        $parentEnfant   = $parentRep->findByIdEnfant($dossierEnfant[0]->getIdDossierEnfant());

        $enfant         = $dossierEnfant[0];
        $parent         = null;

        // try{
            $parent = $parentEnfant[0];
        // }catch(\ErrorException $e){
        //     $parent = new Parents();
        // }

        $login = session('login');
        return view("back.detail-dossier-enfant",compact("enfant","parent","login"));
    }

    public function  dossierJuridiquePDF($id)
    {
        $dossierRep     = $this->em->getRepository(DossierEnfant::class);
        $dossierEnfant  = $dossierRep->findByIdDossierEnfant($id);

        $parentRep      = $this->em->getRepository(Parents::class);
        $parentEnfant   = $parentRep->findById($dossierEnfant[0]->getIdDossierEnfant());

        $enfant         = $dossierEnfant[0];
        $parent         = null;

        try{
            $parent = $parentEnfant[0];
        }catch(\ErrorException $e){
            $parent = new Parents();
        }

        $pdf = PDF::loadView('back.dossier-juridique-template-pdf', compact("login", "dossier", "enfant", "parent"));

        return $pdf->download($enfant->getNomEnfant().'-'.$enfant->getPrenomEnfant().'.pdf');

        redirect()->back();

        //return view('back.dossier-juridique-template-pdf', compact("login", "dossier", "enfant", "parent"));
    }


    public function addDossierTribunal(Request $request)
    {
        $nom = $request->get("nom");
        $extension = $request->file('doc')->getMimeType(); 
        $ext = explode('/',$extension)[1];
        $request->file('doc')->storeAs('dossier-juridique',$nom.'.'.$ext);
        
        $message = "Le dossier tribunal a bien ete ajouter";
        return redirect()->back()->withErrors([$message]);
    }

    public function getDossierTribunal($nom){
        $ok=false;
        $pat = null;
        $files = Storage::allFiles('dossier-juridique');
        foreach ($files as $value) {
            
            $t = explode("/",$value)[1];
            $o =  explode(".",$t)[0];
            
            if($o ===$nom){
                $pat =  $value;
                $ok = true;
            }
            
        }

        if($ok){
            return Storage::download( $pat);
        }else{
            $message = "Le dossier de l'enfant ne contient pas encore de dossier juridique";
            return redirect()->back()->withErrors([$message]);
        }
       

    }

    public function update(Request $request, $id)
    {
        //
    }

}
