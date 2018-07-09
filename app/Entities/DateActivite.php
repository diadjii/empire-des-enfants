<?php
namespace App\Entities;


use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="date_activite")
 */

class DateActivite{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idActivite;

    /**
     * @ORM\Column(type="string")
     * @ORM\ManyToOne(targetEntity=Activite::class)
     */
    private $dateActivite;

    /**
     * @ORM\Column(type="string")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    private $dateFin;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getIdActivite()
    {
        return $this->idActivite;
    }

    public function setIdActivite($idActivite)
    {
        $this->idActivite = $idActivite;

        return $this;
    }

    public function getDateActivite()
    {
        return $this->dateActivite;
    }

    public function setDateActivite($dateActivite)
    {
        $this->dateActivite = $dateActivite;

        return $this;
    }

    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin()
    {
        return $this->dateFin;
    }

    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

}

