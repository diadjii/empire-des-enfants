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
    public static  function store(EntityManagerInterface $em ,$info)
    {
        $dateEvent  = date('\L\e Y/m/d à  H\h:i\m\n');

        $eventStore = new EventStore();

        $eventStore->setTypeAction($info['typeAction']);
        $eventStore->setUserId($info['userId']);
        $eventStore->setDateTime($dateEvent);

        

        $em->persist($eventStore);
        $em->flush();
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

    public function destroy($id)
    {
        //
    }
}
