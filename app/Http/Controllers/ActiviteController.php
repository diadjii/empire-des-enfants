<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entities\Activite;
use App\Http\Requests\ActiviteFormRequest;

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
    public function store(Request $request)
    {
        $nomActivite = $request->get('nomActivite');
        $descActivite = $request->get('descActivite');

        $date = date('Y-m-d');//recuperation de la date actuelle

        $activite = new Activite();
        $activite->setNomActivite($nomActivite);
        $activite->setDescActivite($descActivite);
        $activite->setDateCreation($date);

        $this->em->persist($activite);
        $this->em->flush();

        return "ok";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $acrep = $this->em->getRepository(Activite::class);
      $liste = $acrep->findAll();
      $activites=array();

      //recuperation de la liste des activites
      foreach ($liste as $act) {
        $currentActivite=array(
          "id"  => $act->getIdActivite(),
          "nomActivite" => $act->getNomActivite(),
          "descActivite" => $act->getDescActivite(),
          "date" => $act->getDateActivite(),

        );
        array_push($activites,$currentActivite);
      }
      return $activites;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idActivite)
    {
        //
        $acrep = $this->em->getRepository(Activite::class);
        $activite = $acrep->findByIdActivite($idActivite);
        $act=array(
          "idActivite" =>$activite[0]->getIdActivite(),
          "nomActivite" =>$activite[0]->getNomActivite(),
          "descActivite" =>$activite[0]->getDescActivite()
        );
        return $act;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $idActivite    = $request->get('idActivite');
        $nomActivite   = $request->get('nomActivite');
        $descActivite  = $request->get('descActivite');

        $acrep = $this->em->getRepository(Activite::class);
        $activite = $acrep->findByIdActivite($idActivite);

        $activite[0]->setNomActivite($nomActivite);
        $activite[0]->setDescActivite($descActivite);

        $this->em->flush();
        return "ok";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $acrep = $this->em->getRepository(Activite::class);
      $activite = $acrep->findByIdActivite($id);

      $this->em->remove($activite[0]);
      $this->em->flush();

      return "ok";
    }


    function agendaActivites(){
      $acrep = $this->em->getRepository(Activite::class);
      $liste = $acrep->findAll();
      $activites=array();

      //recuperation de la liste des activites
      foreach ($liste as $act) {
        $currentActivite=array(
          "id"  => $act->getIdActivite(),
          "title" => $act->getNomActivite(),
          "start" => $act->getDateActivite(),
          "description" => $act->getDescActivite()
        );
        array_push($activites,$currentActivite);
      }
      return $activites;
    }

    //enregistrement d'une activte dans le calendrier ds activites
    public function saveToAgenda(Request $request){
      $idActivite = $request->get('idActivite');
      $dateActivite = $request->get('dateActivite');

      $acrep = $this->em->getRepository(Activite::class);
      $activite = $acrep->findByIdActivite($idActivite);

      $activite[0]->setDateActivite($dateActivite);

      try {
        $this->em->persist($activite[0]);
        $this->em->flush();
        return "ok";
      } catch (\Exception $e) {
        return $e->getMessage();
      }

    }
}
