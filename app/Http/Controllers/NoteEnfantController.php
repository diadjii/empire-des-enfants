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

    public function index($id)
    {
        $noteRep    = $this->em->getRepository(NoteEnfant::class);
        $noteListe  = $noteRep->findByIdDossierEnfant($id);

        $login = session('login');

        return view("new.liste-des-notes-enfant",compact("login","noteListe","id"));
    }

    public function store(Request $request)
    {
        $id             = $request->get("idDossierEnfant");
        $objetNote      = $request->get("objet");
        $note           = $request->get("note");
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

  
}
