<?php

namespace App\Http\Controllers;

use App\Entities\NoteEnfant;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;

class NoteEnfantController extends Controller
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
    public function index($id)
    {
        $noteRep    = $this->em->getRepository(NoteEnfant::class);
        $noteListe  = $noteRep->findByIdDossierEnfant($id);

        $login = session('login');

        return view("new.liste-des-notes-enfant",compact("login","noteListe","id"));
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
        $id         = $request->get("idDossierEnfant");
        $objetNote  = $request->get("objet");
        $note       = $request->get("note");
        $dateAjoutNote  = date('\A\j\o\u\t\e\r\ \l\e Y/m/d à  H\h:i\m\n');

        $noteEnfant = new NoteEnfant();

        $noteEnfant->setIdDossierEnfant($id);
        $noteEnfant->setObjet($objetNote);
        $noteEnfant->setNote($note);
        $noteEnfant->setDateAjoutNote($dateAjoutNote);

        $this->em->persist($noteEnfant);
        $this->em->flush();

        return redirect()->action("NoteEnfantController@index",[$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
