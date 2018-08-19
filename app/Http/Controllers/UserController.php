<?php

namespace App\Http\Controllers;

use App\Entities\Admin;
use App\Entities\Animateur;
use App\Entities\Encadreur;
use App\Entities\Infirmier;
use App\Entities\User;

use App\Http\Controllers\EventStoreController;
use App\Http\Requests\UserFormRequest;

use Doctrine\ORM\EntityManagerInterface;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function index()
    {
        $login = session("login");

        return view("new.gestion-activite", compact("login"));
    }

    public function login(Request $request)
    {
        $reponse    = null;
        $login      = $request->get('login');
        $password   = $request->get('password');

        try{
            $u      = $this->em->getRepository(User::class);

        }catch(\Exception $e){
            $reponse ="db error";
            die();
        }

        // $entity = $u->findByLogin($login);

        // if (count($entity) > 0) {
        //     $mdp = $entity[0]->getPassword();
        //     $status = $entity[0]->getStatus();

        //     if (Hash::check($password, $mdp) || $status == "on") {
        //         $type = $this->getTypeUser($entity[0]);

        //         session([
        //             'login'             => $entity[0]->getLogin(),
        //             'id'                => $entity[0]->getId(),
        //             'typeCurrentUser'   => $type,
        //         ]);

        //         $reponse = $type;
        //     } else {
        //         $reponse = "error";
        //     }
        // } else {
        //     $reponse     = "error";
        // }

        // return $reponse;
    }

    public function store(UserFormRequest $request)
    {
        $idCurrentUser  = session('id');

        $login          = $request->get('login');
        $password       = $request->get('password');
        $typeUser       = $request->get('typeUser');
        $nom            = $request->get('nom');
        $prenom         = $request->get('prenom');

        $userRepository = $this->em->getRepository(User::class);
        $entity         = $userRepository->findByLogin($login);
        $currentUser    = $userRepository->findById($idCurrentUser);

        if (count($entity) > 0) {
            return redirect()->back()->withErrors(["Ce compte d'utilisateur existe dejà."]);
        } else {
            $this->registreUser($login, $password, $typeUser, $nom, $prenom);

            $info = [
                "typeAction"    => "Creation Compte Utlisateur",
                "userId"        => session("id"),
                "typeUser"      => session('typeCurrentUser'),
                "description"   => "Creation compte utilisateur " . $nom . " " . $prenom . " par " . $currentUser[0]->getPrenom() . " " . $currentUser[0]->getNom(),
            ];

            EventStoreController::store($this->em, $info);

        }

        return redirect()->action("UserController@show");
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

            array_push($users, $u);
        }

        return view('new.liste-utilisateurs', compact("users", "login"));
    }

    public function delete($id)
    {
        $idCurrentUser = session('id');

        if (session("typeCurrentUser") == "admin") {

            $userRep        = $this->em->getRepository(User::class);
            $user           = $userRep->findById($id);
            $currentUser    = $userRep->findById($idCurrentUser);

            try {
                $this->em->remove($user[0]);
                $this->em->flush();
                $info = [
                    "typeAction"    => "Suppression Compte Utlisateur",
                    "userId"        => session("id"),
                    "typeUser"      => session('typeCurrentUser'),
                    "description"   => "Suppression de l'utilisateur " . $user[0]->getNom() . " " . $user[0]->getPrenom() . " par " . $currentUser[0]->getPrenom() . " " . $currentUser[0]->getNom(),
                ];
                EventStoreController::store($this->em, $info);
                return "ok";
            } catch (\Exception $e) {
                return $e->getMessage();
            }

        }
    }

    public static function isLogin()
    {
        $login  = session('login');
        if (isset($login)) {

            return view("new.gestion-activite", compact('login'));
        } else {
            return view("new.login");
        }
    }

    public function getTypeUser($myObject)
    {
        return  $this->em->getClassMetadata(get_class($myObject))->discriminatorValue;
    }

    public function registreUser($log, $pass, $us, $nom, $prenom)
    {
        $user = null;

        switch ($us) {
            case 'admin': //administrateur
                $user = new Admin();
                break;
            case 'infirm': //infirmier
                $user = new Infirmier();
                break;
            case 'enca': //encadreur
                $user = new Encadreur();
                break;
            case 'anim': //animateur
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

    public function changeStatusToON($id)
    {
        $userRep        = $this->em->getRepository(User::class);
        
        $idCurrentUser  = session('id');
        $user           = $userRep->findById($id);
        $currentUser    = $userRep->findById($idCurrentUser);

        $user[0]->setStatus("on");

        try {
            $this->em->flush();

            $info = [
                "typeAction"    => "Activation Compte Utilisateur",
                "userId"        => session("id"),
                "typeUser"      => session('typeCurrentUser'),
                "description"   => "Activation du compte de " . $user[0]->getNom() . " " . $user[0]->getPrenom() . " par " . $currentUser[0]->getPrenom() . " " . $currentUser[0]->getNom(),
            ];

            EventStoreController::store($this->em, $info);

            return "ok";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function changeStatusToOff($id)
    {
        $userRep        = $this->em->getRepository(User::class);
        $idCurrentUser  = session('id');
        $user           = $userRep->findById($id);

        $user[0]->setStatus("off");

        $currentUser = $userRep->findById($idCurrentUser);

        try {
            $this->em->flush();

            $info = [
                "typeAction"    => "Desactivation Compte Utlisateur",
                "userId"        => session("id"),
                "typeUser"      => session('typeCurrentUser'),
                "description"   => "Desactivation compte de " . $user[0]->getNom() . " " . $user[0]->getPrenom() . " par " . $currentUser[0]->getPrenom() . " " . $currentUser[0]->getNom(),
            ];

            EventStoreController::store($this->em, $info);

            return "ok";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    //reinitialisation du mot de passe utilisateur
    public function resetPassword(Request $request)
    {
        $idUser         = $request->get("idUser");
        $password       = $request->get("newPassword");
        $password       = Hash::make($password);

        $idCurrentUser  = session('id');

        $userRep        = $this->em->getRepository(User::class);
        $user           = $userRep->findById($idUser);

        $currentUser    = $userRep->findById($idCurrentUser);

        if (isset($user)) {
            $user[0]->setPassword($password);
            $this->em->flush();

            $info = [
                "typeAction"    => "Reinitialisation mot de passe utlisateur",
                "userId"        => session("id"),
                "typeUser"      => session('typeCurrentUser'),
                "description"   => "Reinitialisation du mot de passe de " . $user[0]->getNom() . " " . $user[0]->getPrenom() . " par " . $currentUser[0]->getPrenom() . " " . $currentUser[0]->getNom(),
            ];

            EventStoreController::store($this->em, $info);
            return "ok";
        }

    }

    public function showProfil($login)
    {
        $userRep    = $this->em->getRepository(User::class);
        $user       = $userRep->findByLogin($login);
        $infoUser   = null;
        $login      = session('login');

        if (isset($user)) {
            $infoUser = $user[0];
        }


        return view("new.view-profil", compact("login", "infoUser"));
    }

    public function editProfil(Request $request)
    {
        $login          = $request->get("login");
        $nom            = $request->get("nom");
        $prenom         = $request->get("prenom");
        $newPassword    = $request->get("new-password");

        $userRep        = $this->em->getRepository(User::class);
        $user           = $userRep->findByLogin($login);

        $user[0]->setNom($nom);
        $user[0]->setPrenom($prenom);

        if (isset($newPassword)) {
            $user[0]->setPassword($newPassword);
        }

        $this->em->flush();

        return redirect()->back()->with('ok', 'Modification enregistrée avec succés');
    }
}
