<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entities\User;
class UserController extends Controller
{
    private $em;
    const LOGIN ='login';

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

    public function login(Request $request){
      $login = $request->get($this::LOGIN);
      $u = $this->em->getRepository(User::class);
      $entity = $u->findByLogin($login);

      $type= $this->getTypeUser($entity[0]);
      session(['login'=>$entity[0]->getLogin(),
                'id'=>$entity[0]->getId()
      ]);
      echo $type;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    //recuperation du type utilisateur
    public function getTypeUser($myObject){
      $typeUser=$this->em->getClassMetadata(get_class($myObject))->discriminatorValue;

      return $typeUser;
    }
}
