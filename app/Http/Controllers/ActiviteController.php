<?php

namespace App\Http\Controllers;

use App\Entities\Activite;
use App\Entities\DateActivite;
use App\Http\Requests\ActiviteFormRequest;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
  private $em;

  public function __construct(EntityManagerInterface $em){
    UserController::isLogin();
    $this->em = $em;
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create(Request $request)
  {
      $nomActivite      = $request->get("nomActivite"); 
      $couleurActivite  = $request->get('couleur');
      echo $nomActivite;

    

    $activite = new Activite();
    $activite->setNomActivite($nomActivite);
    $activite->setDescActivite("");
    $activite->setDateCreation("");
    $activite->setColor($couleurActivite);
    $activite->setBgColor($couleurActivite);

    $this->em->persist($activite);
    $this->em->flush();

    return "ok";
  }


  public function store(Request $request)
  {
    $nomActivite  = $request->get('nomActivite');
    $descActivite = $request->get('descActivite');

    $date = date('Y-m-d');

    $activite = new Activite();
    $activite->setNomActivite($nomActivite);
    $activite->setDescActivite($descActivite);
    $activite->setDateCreation($date);

    $this->em->persist($activite);
    $this->em->flush();

    return "ok";
  }

  public function show()
  {
    $acrep      = $this->em->getRepository(Activite::class);
    $liste      = $acrep->findAll();
    $activites  = array();

    //recuperation de la liste des activites
    foreach ($liste as $act) {

      $currentActivite = array(
        "id"            => $act->getIdActivite(),
        "nomActivite"   => $act->getNomActivite(),
        "descActivite"  => $act->getDescActivite(),
        "color"         =>  $act->getColor()
      );
      array_push($activites,$currentActivite);
    }
    return $activites;
  }

  public function edit($idActivite)
  {
    //
    $acrep    = $this->em->getRepository(Activite::class);
    $activite = $acrep->findByIdActivite($idActivite);
    
    $act      = array(
      "idActivite"    =>$activite[0]->getIdActivite(),
      "nomActivite"   =>$activite[0]->getNomActivite(),
      "descActivite"  =>$activite[0]->getDescActivite()
    );
    return $act;
  }


  public function update(Request $request)
  {
    $idActivite    = $request->get('idActivite');
    $nomActivite   = $request->get('nomActivite');
    $descActivite  = $request->get('descActivite');

    $acrep          = $this->em->getRepository(Activite::class);
    $activite       = $acrep->findByIdActivite($idActivite);

    $activite[0]->setNomActivite($nomActivite);
    $activite[0]->setDescActivite($descActivite);

    $this->em->flush();
    return "ok";
  }


  public function destroy($id)
  {
    $acrep = $this->em->getRepository(Activite::class);
    $activite = $acrep->findByIdActivite($id);

    $this->em->remove($activite[0]);
    $this->em->flush();

    return "ok";
  }


  function agendaActivites(){
    $acrep        = $this->em->getRepository(Activite::class);
    $liste        = $acrep->findAll();
    $activites    = array();
    $dateActiRep  = $this->em->getRepository(DateActivite::class);

    //recuperation de la liste des activites
    foreach ($liste as $act) {
        $idCurrentActivite = $act->getIdActivite();
        
        if($dateActiRep->findByIdActivite($idCurrentActivite)){
          $dateActivite = $dateActiRep->findByIdActivite($idCurrentActivite);

          for ($i = 0; $i <count($dateActivite) ; $i++) {
            $currentActivite  = array(
              "id"              => $dateActivite[$i]->getId(),
              "title"           => $act->getNomActivite(),
              "start"           => $dateActivite[$i]->getDateDebut(),
              "end"             => $dateActivite[$i]->getDateFin(),
              "borderColor"     => $act->getColor(),
              "backgroundColor" => $act->getBgColor()
            );

            array_push($activites,$currentActivite);
          }
      }
    }
    return $activites;
  }

  //enregistrement d'une activte dans le calendrier ds activites
  public function saveToAgenda(Request $request){
    $idActivite = $request->get('idActivite');
    $date       = $request->get('dateDebut');

    $dateActivite = new DateActivite();
    $dateActivite->setIdActivite($idActivite);
    $dateActivite->setDateDebut($date);
    $dateActivite->setDateFin('');
    $dateActivite->setDateActivite('');

    try {
      $this->em->persist($dateActivite);
      $this->em->flush();
      return "ok";
    } catch (\Exception $e) {
      return $e->getMessage();
    }

  }

  public function updateActivite(Request $request){
    $idActivite = $request->get("idActivite");
    $heureDebut = $request->get("heureDebut");
    $heureFin   = $request->get("heureFin");

    $dateActiRep = $this->em->getRepository(DateActivite::class);

    $activite = $dateActiRep->findById($idActivite);

    $activite[0]->setDateDebut($heureDebut);
    $activite[0]->setDateFin($heureFin);

    try {
      $this->em->flush();
      return "ok";
    } catch (\Exception $e) {
      return   $e->getMessage();
    }
     // return   $idActivite;
  }
}
