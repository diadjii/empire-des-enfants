<?php

namespace App\Http\Controllers;

use App\Entities\User;

use Illuminate\Http\Request;

use App\Entities\DossierEnfant;
use Doctrine\ORM\EntityManagerInterface;

class StatistiqueController extends Controller
{
    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }
   
    public function index()
    {
        $urep   = $this->em->getRepository(User::class);
        $liste  = $urep->findAll();

        $erep   = $this->em->getRepository(DossierEnfant::class);
        $enfants  = $erep->findAll();

        $nombreAdmin        = $this->getNombreAdmin($liste);
        $nombreInfirmier    = $this->getNombreInfirmier($liste);
        $nombreEncadreur    = $this->getNombreEncadreur($liste);
        $nombreAnimateur    = $this->getNombreAnimateur($liste);
        $nombreEnfantPerdu  = $this->getNombreEnfantPerdu($enfants);
        $nombreEnfantRupture = $this->getNombreEnfantRupture($enfants);
        $nombreEnfantTraite = $this->getNombreEnfantTraite($enfants);

        $nombreEnfant       = count($enfants);
        $nombreUtilisateur  = count($liste);
      
        $login = session("login");

        return view("new.statistique",compact("nombreAdmin","nombreInfirmier","nombreEncadreur","nombreAnimateur","nombreEnfant","nombreUtilisateur","nombreEnfantPerdu","nombreEnfantRupture","nombreEnfantTraite","login"));
    }

     function getNombreAdmin($listeUser){
         //recuperation de la liste des utilisateurs
         $i = 0;
         foreach ($listeUser as $user) {
            $u = new User();
            
            $n = $this->getTypeUser($user);
            
            if($n == "admin"){
                $i++;
            }
            
        }
        return $i;

    }

     function getNombreInfirmier($listeUser){
        $i = 0;
        foreach ($listeUser as $user) {
           $n = $this->getTypeUser($user);
           
           if($n =="infirmier"){
               $i++;
           }
           
        }
        return $i;
    }

     function getNombreEncadreur($listeUser){
        $i = 0;
        foreach ($listeUser as $user) {
           $u = new User();
           
           $n = $this->getTypeUser($user);
           
           if($n =="encadreur"){
               $i++;
           }
           
        }
        return $i;
    }

     function getNombreAnimateur($listeUser){
        $i = 0;
        foreach ($listeUser as $user) {
           $u = new User();
           
           $n = $this->getTypeUser($user);
           
           if($n =="animateur"){
               $i++;
           }
           
        }
        return $i;
    }

    function getNombreEnfant($listeUser){
        $i = 0;
        foreach ($listeUser as $user) {
               $i++;
        }
        return $i;
    }

    function getNombreEnfantPerdu($listeUser){
        $i = 0;
        foreach ($listeUser as $user) {
            if($user->getProfil() == "ep"){
                $i++;
            }
        }
        return $i;
    }

    function getNombreEnfantTraite($listeUser){
        $i = 0;
        foreach ($listeUser as $user) {
            if($user->getProfil() == "evt"){
                $i++;
            }
        }
        return $i;
    }

    function getNombreEnfantRupture($listeUser){
        $i = 0;
        foreach ($listeUser as $user) {
               
            if($user->getProfil() == "erf"){
                $i++;
            }
        }
        return $i;
    }

    public function getTypeUser($myObject){
        return   $this->em->getClassMetadata(get_class($myObject))->discriminatorValue;
    }
}
