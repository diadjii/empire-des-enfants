<?php

namespace App\Http\Controllers;

use App\Entities\EventStore;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;

class EventStoreController extends Controller
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
        $eventRep   = $this->em->getRepository(EventStore::class);
        $liste      = $eventRep->findAll("ASC");
        $login      = session('login');
        
        $liste = array_reverse($liste);
        return view("new.liste-des-evenements",compact('liste','login'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static  function store(EntityManagerInterface $em ,$info)
    {
        $dateEvent  = date('\L\e Y/m/d à  H\h:i\m\n');
        $eventStore = new EventStore();

        $eventStore->setTypeAction($info['typeAction']);
        $eventStore->setUserId($info['userId']);
        $eventStore->setTypeUser($info['typeUser']);
        $eventStore->setDescription($info["description"]); 
        $eventStore->setDateTime($dateEvent);

        $em->persist($eventStore);
        $em->flush();
    }
}
