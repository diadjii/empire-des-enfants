<?php
namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="dossier_enfant")
*/
class DossierEnfant{
  /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @ORM\Column(name="id",type="integer")
  */
  private $idDossierEnfant;

  /**
  * @ORM\Column(type="string")
  */
  private $nomEnfant;

  /**
  * @ORM\Column(type="string")
  */
  private $prenomEnfant;

  /**
  * @ORM\Column(type="string")
  */
  private $ageEnfant;

  /**
  * @ORM\Column(type="string")
  */
  private $sexeEnfant;

  /**
  * @ORM\Column(type="string")
  */
  private $dateNaissanceEnfant;

  /**
  * @ORM\Column(type="string")
  */
  private $nationaliteEnfant;

  /**
  * @ORM\Column(type="string")
  */
  private $dateAjoutDossierEnfant;

  /**
  * @ORM\OneToOne(targetEntity = DossierMedicale::class)
  */
  private $dossierMedicale;

  /**
  * @ORM\OneToOne(targetEntity = DossierJuridique::class)
  */
  private $dossierJuridique;

  /**
  * @ORM\OneToOne(targetEntity = DossierScolaire::class)
  */
  private $dossierScolaire;

  public function getIdDossierEnfant()
  {
    return $this->idDossierEnfant;
  }


  public function setIdDossierEnfant($idDossierEnfant)
  {
    $this->idDossierEnfant = $idDossierEnfant;
    return $this;
  }

  public function getNomEnfant()
  {
    return $this->nomEnfant;
  }


  public function setNomEnfant($nomEnfant)
  {
    $this->nomEnfant = $nomEnfant;
    return $this;
  }


  public function getPrenomEnfant()
  {
    return $this->prenomEnfant;
  }


  public function setPrenomEnfant($prenomEnfant)
  {
    $this->prenomEnfant = $prenomEnfant;
    return $this;
  }

  public function getAgeEnfant()
  {
    return $this->ageEnfant;
  }

  public function setAgeEnfant($ageEnfant)
  {
    $this->ageEnfant = $ageEnfant;
    return $this;
  }

  public function getSexeEnfant()
  {
    return $this->sexeEnfant;
  }

  public function setSexeEnfant($sexeEnfant)
  {
    $this->sexeEnfant = $sexeEnfant;
    return $this;
  }

  public function getDateNaissanceEnfant()
  {
    return $this->dateNaissanceEnfant;
  }

  public function setDateNaissanceEnfant($dateNaissanceEnfant)
  {
    $this->dateNaissanceEnfant = $dateNaissanceEnfant;
    return $this;
  }

  public function getNationaliteEnfant()
  {
    return $this->nationaliteEnfant;
  }

  public function setNationaliteEnfant($nationaliteEnfant)
  {
    $this->nationaliteEnfant = $nationaliteEnfant;
    return $this;
  }

  public function getDateAjoutDossierEnfant()
  {
    return $this->dateAjoutDossierEnfant;
  }

  public function setDateAjoutDossierEnfant($dateAjoutDossierEnfant)
  {
    $this->dateAjoutDossierEnfant = $dateAjoutDossierEnfant;
    return $this;
  }

}

 ?>
