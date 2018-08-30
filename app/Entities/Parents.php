<?php
namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="parent")
*/

class Parents {

  /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @ORM\Column(name="id",type="integer")
  */
  private $id;

  /**
  * @ORM\Column(type="string",nullable=true)
  */
  private $prenomPere;

  /**
  * @ORM\Column(type="string",nullable=true)
  */
  private $nomMere ;

  /**
  * @ORM\Column(type="string",nullable=true)
  */
  private $prenomMere;

  /**
  *  @ORM\ManyToOne(targetEntity = DossierEnfant::class)
  */
  private $idEnfant;

  /**
  * @ORM\Column(type="string",nullable=true)
  */
  private $numTel;

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
  * Get the value of Prenom Pere
  *
  * @return mixed
  */
  public function getPrenomPere()
  {
    return $this->prenomPere;
  }

  /**
  * Set the value of Prenom Pere
  *
  * @param mixed prenomPere
  *
  * @return self
  */
  public function setPrenomPere($prenomPere)
  {
    $this->prenomPere = $prenomPere;

    return $this;
  }

  /**
  * Get the value of Nom Mere
  *
  * @return mixed
  */
  public function getNomMere()
  {
    return $this->nomMere;
  }

  /**
  * Set the value of Nom Mere
  *
  * @param mixed nomMere
  *
  * @return self
  */
  public function setNomMere($nomMere)
  {
    $this->nomMere = $nomMere;

    return $this;
  }

  /**
  * Get the value of Prenom Mere
  *
  * @return mixed
  */
  public function getPrenomMere()
  {
    return $this->prenomMere;
  }

  public function setPrenomMere($prenomMere)
  {
    $this->prenomMere = $prenomMere;

    return $this;
  }

  public function getNumTel()
  {
    return $this->numTel;
  }

  public function setNumTel($numTel)
  {
    $this->numTel = $numTel;

    return $this;
  }

    public function getIdEnfant()
    {
        return $this->idEnfant;
    }

    public function setIdEnfant($idEnfant)
    {
        $this->idEnfant = $idEnfant;

        return $this;
    }

}
