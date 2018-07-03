<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\DossierEnfant;
use Doctrine\ORM\EntityManagerInterface;

class InfirmierController extends Controller
{

    private $em;

  public function __construct(EntityManagerInterface $em){
    UserController::isLogin();
    $this->em = $em;
  }
   
    public function index()
    {
        UserController::isLogin();
    }

public function accueil(){
  return view('infirmier')->with('login',session('login'));
}
   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show()
    {
        $dossierRep = $this->em->getRepository(DossierEnfant::class);
        $liste = $dossierRep->findAll();
        $login = session('login');
        
        return view('back.infirmier',compact("liste","login"));
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
