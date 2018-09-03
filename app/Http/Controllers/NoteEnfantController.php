<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Entities\NoteEnfant;
use App\Entities\DossierEnfant;


use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;

class NoteEnfantController extends Controller
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function index($id)
    {
        $noteRep    = $this->em->getRepository(NoteEnfant::class);
        $noteListe  = $noteRep->findByIdDossierEnfant($id);

        $login          = session('login');
        $idCurrentUser  = session("id");

        $idUserNoted = $this->getIdUserNoted($noteListe);
        
        return view("new.liste-des-notes-enfant", compact("login", "noteListe", "id","idCurrentUser","idUserNoted"));
    }

    public function store(Request $request)
    {
        $id             = $request->get("idDossierEnfant");
        $objetNote      = $request->get("objet");
        $note           = $request->get("note");
        
        $dateAjoutNote  = date('\A\j\o\u\t\e\r\ \l\e Y/m/d à  H\h:i\m\n');

        $dossierRep     = $this->em->getRepository(DossierEnfant::class);
        $dossierEnfant  = $dossierRep->findByIdDossierEnfant($id);

        $currentUser    = $this->getEntityCurrentUser();
        
        $noteEnfant     = new NoteEnfant();

        $noteEnfant->setIdDossierEnfant($dossierEnfant[0]);
        $noteEnfant->setObjet($objetNote);
        $noteEnfant->setNote($note);
        $noteEnfant->setIdUser($currentUser[0]);
        $noteEnfant->setDateAjoutNote($dateAjoutNote);

        $this->em->persist($noteEnfant);
        $this->em->flush();

        return redirect()->action("NoteEnfantController@index", [$id]);
    }

    /**
     * @return entity User::class 
     */
    public function getEntityCurrentUser(){
        $userRep    = $this->em->getRepository(User::class);
        
        return  $userRep->findById(session("id")); 

    }


    public function getIdUserNoted($noteListe){

        try{
            $user   = $noteListe[0]->getIdUser();
            $idUser = $user->getId();

            return $idUser;
        }catch(\Exception $e){

            return 0;
        }
    
    }
}
