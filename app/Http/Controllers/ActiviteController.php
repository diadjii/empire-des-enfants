<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entities\Activite;
use App\Http\Requests\ActiviteFormRequest;

class ActiviteController extends Controller
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
        $date = date('l \t\h\e jS');
        
        $activite = new Activite();
        $activite->setNomActivite($nomActivite);
        $activite->setDescActivite($descActivite);
        $activite->setDateCreation($date);

        $this->em->persist($activite);
        $this->em->flush();
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
          "date" => $act->getDateCreation(),
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
