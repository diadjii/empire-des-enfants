<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDossierEnfantFormRequest;
use App\Entities\DossierEnfant;
use App\Entities\Parents;
use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
class DossierEnfantController extends Controller
{
  private $em;

  public function __construct(EntityManagerInterface $em){
    $this->em = $em;
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $login = session('login');
        return view("back.dossierenfant",compact("login"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDossierEnfantFormRequest $request)
    {
    $nomEnfant      = $request->get('nom');
    $prenomEnfant   = $request->get('prenom');
    $origine        = $request->get('origine');

    $dateNaissance  = $request->get('dateNaissance');
    $lieuNaissance  = $request->get('lieuNaissance');
    $adresse        = $request->get('adresse');

    $photo          = $request->get('photoEnfant');
    $description    = $request->get('description');
    $profilEnfant   = $request->get('profilEnfant');

    $prenomPere     = $request->get('prenomPere');
    $prenomMere     = $request->get('prenomMere');
    $nomMere        = $request->get('nomMere');
    $numTel         = $request->get('numTel');

    $u = $this->em->getRepository(DossierEnfant::class);

    $dossierEnfant = new DossierEnfant();

    $dossierEnfant->setNomEnfant($nomEnfant);
    $dossierEnfant->setPrenomEnfant($prenomEnfant);
    $dossierEnfant->setOrigineEnfant($origine);
    $dossierEnfant->setDateNaissanceEnfant($dateNaissance);
    $dossierEnfant->setLieuNaissance($lieuNaissance);
    $dossierEnfant->setAdresse($adresse); $dossierRep = $this->em->getRepository(DossierEnfant::class);
    $liste = $dossierRep->findAll();
    $login = session('login');
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
    $dossierRep = $this->em->getRepository(DossierEnfant::class);
    $dossierEnfant = $dossierRep->findByIdDossierEnfant($id);

    $parentRep = $this->em->getRepository(Parents::class);
    $parentEnfant = $parentRep->findById($dossierEnfant[0]->getIdDossierEnfant());
    $enfant = $dossierEnfant[0];
    $parent;
    // $detailsDossier=[
    //   "nom" =>$dossierEnfant[0]->getNomEnfant(),
    //   'prenom' =>$dossierEnfant[0]->getPrenomEnfant(),
    //   'adresse' =>$dossierEnfant[0]->getAdresse(),
    //   'profil' =>$dossierEnfant[0]->getProfil(),
    //   'description' =>$dossierEnfant[0]->getDescription(),
    //   'lieuNaissance' =>$dossierEnfant[0]->getLieuNaissance(),
    //   'dateNaissance' =>$dossierEnfant[0]->getDateNaissanceEnfant(),
    //   'origine' =>$dossierEnfant[0]->getOrigineEnfant(),
    // ];
    try{
     $parent = $parentEnfant[0];
      }catch(\ErrorException $e){
       $parent = new Parents();
      }

      $login = session('login');
      return view("back.detail-dossier-enfant",compact("enfant","parent","login"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

  //enregistrement de l'image
  public function storeImage($prenom,$nom,$id){

    try {
      //  stockage de la photo de
      $path =  $request->file('photoEnfant')->storeAs('photo-enfant',$prenom.'-'.$nom.'-'.$id);
      return true;
    } catch (\Exception $e) {
      return $e->getMessage();
    }
    }
}
