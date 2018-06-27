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

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Id Activite
     *
     * @return mixed
     */
    public function getIdActivite()
    {
        return $this->idActivite;
    }

    /**
     * Set the value of Id Activite
     *
     * @param mixed idActivite
     *
     * @return self
     */
    public function setIdActivite($idActivite)
    {
        $this->idActivite = $idActivite;

        return $this;
    }

    /**
     * Get the value of Date Activite
     *
     * @return mixed
     */
    public function getDateActivite()
    {
        return $this->dateActivite;
    }

    /**
     * Set the value of Date Activite
     *
     * @param mixed dateActivite
     *
     * @return self
     */
    public function setDateActivite($dateActivite)
    {
        $this->dateActivite = $dateActivite;

        return $this;
    }



    /**
     * Get the value of Date Debut
     *
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set the value of Date Debut
     *
     * @param mixed dateDebut
     *
     * @return self
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get the value of Date Fin
     *
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set the value of Date Fin
     *
     * @param mixed dateFin
     *
     * @return self
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

}


 ?>
