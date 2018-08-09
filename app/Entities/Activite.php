<?php
namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="activite")
*/
class Activite{
    /**
     * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(type="integer")
    */
    private $idActivite;

    /**
     *@ORM\Column(type="text")
    */
    private $nomActivite;

    /**
     *@ORM\Column(type="string")
    */
    private $descActivite;

    /**
     * @ORM\Column(type="string")
    */
    private $dateCreation;

    /**
     * @ORM\Column(type="string",nullable=true)
    */
    private $dateActivite;

    /**
     * @ORM\Column(type="string")
    */
    private $color;

    /**
     * @ORM\Column(type="string")
    */
    private $bgColor;

    public function getIdActivite(){
        return $this->idActivite;
    }

    public function setIdActivite($idActivite){
        $this->idActivite = $idActivite;
        return $this;
    }


    public function getNomActivite(){
        return $this->nomActivite;
    }

    public function setNomActivite($nomActivite){
        $this->nomActivite = $nomActivite;

        return $this;
    }

    public function getDescActivite(){
        return $this->descActivite;
    }

    public function setDescActivite($descActivite){
        $this->descActivite = $descActivite;

        return $this;
    }

    public function getDateCreation(){
        return $this->dateCreation;
    }

    public function setDateCreation($dateCreation){
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateActivite(){
        return $this->dateActivite;
    }

    public function setDateActivite($dateActivite){
        $this->dateActivite = $dateActivite;

        return $this;
    }

    public function getColor(){
        return $this->color;
    }

    public function setColor($color){
        $this->color = $color;

        return $this;
    }

    public function getBgColor()
    {
        return $this->bgColor;
    }

    public function setBgColor($bgColor)
    {
        $this->bgColor = $bgColor;

        return $this;
    }

}
