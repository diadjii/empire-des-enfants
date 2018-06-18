<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entities\User;
use App\Entities\Admin;
use App\Entities\Infirmier;
use App\Entities\Encadreur;
use App\Entities\Animateur;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  private $em;

  public function __construct(EntityManagerInterface $em){
    $this->em = $em;
  }

  public function login(Request $request){
    $login = $request->get('login');
    $password = $request->get('password');

    $u = $this->em->getRepository(User::class);
    $entity = $u->findByLogin($login);

    if(count($entity) > 0){
      $mdp = $entity[0]->getPassword();

      if(Hash::check($password,$mdp)){
        $type= $this->getTypeUser($entity[0]);
        session([
          'login'=>$entity[0]->getLogin(),
          'id'=>$entity[0]->getId(),
          'typeCurrentUser' =>$type
        ]);
        echo $type;
      }else{
        echo "noPassword";
      }
    }else{
      echo "noAccount";
    }
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(UserFormRequest $request)
  {
    $login    = $request->get('login');
    $password = $request->get('password');
    $typeUser = $request->get('typeUser');
    $nom = $request->get('nom');
    $prenom = $request->get('prenom');
    $u = $this->em->getRepository(User::class);
    $entity = $u->findByLogin($login);
    if(count($entity)>0){
      return 'exist';
    }else{
      $this->registreUser($login,$password,$typeUser,$nom,$prenom);
      return "ok";
    }
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show()
  {
    $urep = $this->em->getRepository(User::class);
    $liste = $urep->findAll();
    $users=array();

    //recuperation de la liste des utilisateurs
    foreach ($liste as $user) {
      $currentUser=array(
        "id"  => $user->getId(),
        "nom" => $user->getNom(),
        "prenom" => $user->getPrenom(),
        "role" => $this->getTypeUser($user),
      );

      if ($currentUser['role'] != 'superadmin') {
        array_push($users,$currentUser);
      }
    }
    return $users;
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

  public static function isLogin(){
    $login = session('login');
    $type = session('typeCurrentUser');
    $t="";
    if(isset($login)){
      switch ($type) {
        case 'superadmin':
        $t="superadmin";
        break;
        case 'admin':
        $t="admin";
        break;
        case 'encadreur':
        $t="encadreur";
        break;

        default:
        // code...
        break;
      }
      return view($t,compact('login'));
    }else{
      return view("login");
    }
  }

  //recuperation du type utilisateur
  public function getTypeUser($myObject){
    $typeUser=$this->em->getClassMetadata(get_class($myObject))->discriminatorValue;

    return $typeUser;
  }

  public function registreUser($log,$pass,$us,$nom,$prenom){
    $type = null;
    $user = null;
    switch ($us) {
      case 'admin':
      $user = new Admin();
      break;
      case 'infirm':
      $user = new Infirmier();
      break;
      case 'enca':
      $user = new Encadreur();
      break;
      case 'anim':
      $user = new Animateur();
      break;
      default:
      // code...
      break;
    }

    $user->setLogin($log);
    $user->setNom($nom);
    $user->setPrenom($prenom);
    $pass = Hash::make($pass);
    $user->setPassword($pass);
    $this->em->persist($user);
    $this->em->flush();
    return "ok";
  }


  public function find($idUser){
    echo $ididUser;
  }
}
