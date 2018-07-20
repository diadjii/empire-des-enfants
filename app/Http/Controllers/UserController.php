<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Entities\Admin;

use App\Entities\Animateur;

use App\Entities\Encadreur;
use App\Entities\Infirmier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserFormRequest;

use Doctrine\ORM\EntityManagerInterface;
use App\Http\Controllers\EventStoreController;

class UserController extends Controller
{
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    public function index(){
        $login = session("login");

        return view("back.ajout-new-user",compact("login"));
    }


    public function login(Request $request){
        $reponse = null;

        $login      = $request->get('login');
        $password   = $request->get('password');

        $u          = $this->em->getRepository(User::class);
        $entity     = $u->findByLogin($login);

        if(count($entity) > 0){
            $mdp = $entity[0]->getPassword();

            if(Hash::check($password,$mdp)){
                $type= $this->getTypeUser($entity[0]);

                session([
                    'login'=>$entity[0]->getLogin(),
                    'id'=>$entity[0]->getId(),
                    'typeCurrentUser' =>$type
                ]);

                $reponse = $type;
            }else{
                $reponse = "noPassword";
            }
        }else{
            $reponse = "noAccount";
        }

        return $reponse;
    }

    public function store(UserFormRequest $request)
    {   $reponse = null;
        if(isset($request)){

            $login      = $request->get('login');
            $password   = $request->get('password');
            $typeUser   = $request->get('typeUser');
            $nom        = $request->get('nom');
            $prenom     = $request->get('prenom');

            $u          = $this->em->getRepository(User::class);
            $entity     = $u->findByLogin($login);

            if(count($entity)>0){
                $reponse =  'exist';
            }else{
                $this->registreUser($login,$password,$typeUser,$nom,$prenom);
                
                $info = [
                    "typeAction"    => "ajout utlisateur",
                    "userId"        => session("id"),
                ];
            EventStoreController::store($this->em,$info);
         
                $reponse = "ok";
            }
        }else{
            $reponse ="vide";
        }

        return $reponse;
    }

    public function show()
    {
        $urep   = $this->em->getRepository(User::class);
        $liste  = $urep->findAll();
        $users  = array();

        $login  = session('login');

        //recuperation de la liste des utilisateurs
        foreach ($liste as $user) {
            $u = new User();

            $u->setId($user->getId());
            $u->setNom($user->getNom());
            $u->setPrenom($user->getPrenom());
            $u->setStatus($user->getStatus());

            $u->setRole($this->getTypeUser($user));

            array_push($users,$u);

        }

        return view('back.listeuser',compact("users","login"));
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function delete($id){
        $userRep    = $this->em->getRepository(User::class);
        $user       = $userRep->findById($id);

        try {
            $this->em->remove($user[0]);
            $this->em->flush();
            $info = [
                "typeAction"    => "suppression utlisateur",
                "userId"        => session("id"),
            ];
            EventStoreController::store($this->em,$info);
            return "ok";
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public static function isLogin(){
        $login      = session('login');
        $type       = session('typeCurrentUser');

        $t          = null;
        $reponse    = null;
        if(isset($login)){
            switch ($type) {
                case 'superadmin':
                    $t="back.superadmin";
                    break;
                case 'admin':
                    $t="back.admin";
                    break;
                case 'encadreur':
                    $t="back.encadreur";
                    break;
            }

            return view($t,compact('login'));
        }else{
            return view("login");
        }
    }


    public function getTypeUser($myObject){
        $typeUser   =   $this->em->getClassMetadata(get_class($myObject))->discriminatorValue;

        return $typeUser;
    }

    public function registreUser($log,$pass,$us,$nom,$prenom){
        $type   = null;
        $user   = null;

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
        }

        $pass = Hash::make($pass);

        $user->setLogin($log);
        $user->setNom($nom);
        $user->setPrenom($prenom);
        $user->setStatus("on");
        $user->setPassword($pass);

        $this->em->persist($user);
        $this->em->flush();

        return "ok";
    }

    public function changeStatusToON($id){
        $u      = $this->em->getRepository(User::class);
        $entity = $u->findById($id);

        $entity[0]->setStatus("on");

        try {
            $this->em->flush();
            $info = [
                "typeAction"    => "activation utlisateur",
                "userId"        => session("id"),
            ];
            EventStoreController::store($this->em,$info);
            return "ok";
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function changeStatusToOff($id){
        $u  = $this->em->getRepository(User::class);
        $entity = $u->findById($id);
        $entity[0]->setStatus("off");

        try {
            $this->em->flush();
            $info = [
                "typeAction"    => "desactivation utlisateur",
                "userId"        => session("id"),
            ];
            EventStoreController::store($this->em,$info);
            return "ok";
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    private function storeEvent($info){
        $event = new EventStoreController($this->em);
        $event->store($info);
    }
}
