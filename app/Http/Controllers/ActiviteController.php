<?php

namespace App\Http\Controllers;

use App\Entities\Activite;
use App\Entities\DateActivite;
use App\Entities\User;

use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
  private $em;
  
  public function __construct(EntityManagerInterface $em)
  {
    UserController::isLogin();
    $this->em = $em;
  }
  
  public function create(Request $request)
  {
    $nomActivite      = $request->get("nomActivite");
    $couleurActivite  = $request->get('couleur');
    
    $activite = new Activite();
    
    $activite->setNomActivite($nomActivite);
    $activite->setDescActivite("");
    $activite->setDateCreation("");
    $activite->setColor($couleurActivite);
    $activite->setBgColor($couleurActivite);
    
    $this->em->persist($activite);
    $this->em->flush();
    
    $u = $this->em->getRepository(User::class);
    $currentUser = $u->findById(session("id"));
    
    $info = [
      "typeAction" => "Création Activite",
      "userId" => session("id"),
      "typeUser" => session('typeCurrentUser'),
      "description" => "Création de l'Activite " . $nomActivite . " par " . $currentUser[0]->getPrenom() . " " . $currentUser[0]->getNom(),
    ];
    
    EventStoreController::store($this->em, $info);
    
    return "ok";
  }
  
  public function show()
  {
    $acrep = $this->em->getRepository(Activite::class);
    $liste = $acrep->findAll();
    $activites = array();
    
    //recuperation de la liste des activites
    foreach ($liste as $act) {
      
      $currentActivite = array(
        "id" => $act->getIdActivite(),
        "nomActivite" => $act->getNomActivite(),
        "descActivite" => $act->getDescActivite(),
        "color" => $act->getColor(),
      );
      array_push($activites, $currentActivite);
    }
    return $activites;
  }
  
  public function edit($idActivite)
  {
    $acrep    = $this->em->getRepository(Activite::class);
    $activite = $acrep->findByIdActivite($idActivite);
    
    $act = array(
      "idActivite"    => $activite[0]->getIdActivite(),
      "nomActivite"   => $activite[0]->getNomActivite(),
      "descActivite"  => $activite[0]->getDescActivite(),
    );
    return $act;
  }
  
  public function destroy($id)
  {
    $ids    = explode(',', $id);
    $acrep  = $this->em->getRepository(Activite::class);
    if (count($ids) > 0) {
      
      $u            = $this->em->getRepository(User::class);
      $currentUser  = $u->findById(session("id"));

      for ($i = 0; $i < count($ids); $i++) {
        
        if ($ids[$i] != "") {

          $activite = $acrep->findByIdActivite($ids[$i]);
          
          $this->em->remove($activite[0]);
          $this->em->flush();
        }
        
        $info = [
          "typeAction"  => "Suppression Activite",
          "userId"      => session("id"),
          "typeUser"    => session('typeCurrentUser'),
          "description" => "Suppression de l'Activite " . $activite[0]->getNomActivite() . " par " . $currentUser[0]->getPrenom() . " " . $currentUser[0]->getNom(),
        ];
        
        EventStoreController::store($this->em, $info);
      }
      
      return "ok";
    }
  }
  
  public function agendaActivites()
  {
    $activites = array();
    $acrep = $this->em->getRepository(Activite::class);
    $liste = $acrep->findAll();
    $dateActiRep = $this->em->getRepository(DateActivite::class);
    
    //recuperation de la liste des activites
    foreach ($liste as $act) {
      $idCurrentActivite = $act->getIdActivite();
      
      if ($dateActiRep->findByIdActivite($idCurrentActivite)) {
        $dateActivite = $dateActiRep->findByIdActivite($idCurrentActivite);
        
        for ($i = 0; $i < count($dateActivite); $i++) {
          $currentActivite = array(
            "id" => $dateActivite[$i]->getId(),
            "title" => $act->getNomActivite(),
            "start" => $dateActivite[$i]->getDateDebut(),
            "end" => $dateActivite[$i]->getDateFin(),
            "borderColor" => $act->getColor(),
            "backgroundColor" => $act->getBgColor(),
          );
          
          array_push($activites, $currentActivite);
        }
      }
    }
    return $activites;
  }
  
  //enregistrement d'une activte dans le calendrier ds activites
  public function saveToAgenda(Request $request)
  {
    $idActivite = $request->get('idActivite');

    $acrep = $this->em->getRepository(Activite::class);
    $activite = $acrep->findByIdActivite($idActivite);
    $date       = $request->get('dateDebut');
    
    $dateActivite = new DateActivite();
    
    $dateActivite->setIdActivite($activite[0]);
    $dateActivite->setDateDebut($date);
    $dateActivite->setDateFin('');
    $dateActivite->setDateActivite('');
    
    try {
      $this->em->persist($dateActivite);
      $this->em->flush();
      return $dateActivite->getId();
    } catch (\Exception $e) { 
      return $e->getMessage();
    }
    
  }
  
  public function updateActivite(Request $request)
  {
    $idActivite = $request->get("idActivite");
    $heureDebut = $request->get("heureDebut");
    $heureFin   = $request->get("heureFin");
    
    $dateActiRep = $this->em->getRepository(DateActivite::class);
    
    $activite   = $dateActiRep->findById($idActivite);
    $activite[0]->setDateDebut($heureDebut);
    $activite[0]->setDateFin($heureFin);
    
    try {
      $this->em->flush();
      return $activite[0]->getId();
    
    } catch (\Exception $e) {
      return $e->getMessage();
    }
  }
}
