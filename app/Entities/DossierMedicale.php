<?php
namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
/**
* @ORM\Entity
* @ORM\Table(name="dossier_medicale")
*/
class DossierMedicale {
  /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @ORM\Column(name="id",type="integer")
  */
  private $idDossierMedicale;

  /**
  * @ORM\OneToOne(targetEntity = DossierEnfant::class)
  */
  private $idDossierEnfant;
  
  /**
   * @ORM\Column(type="string")
   */
  private $groupeSanguin;

  /**
   * @ORM\Column(type="string",nullable=true)
   */
  private $dateDernierVisite;

  /**
  *@ORM\Column(type="string",nullable=true)
  */
  private $dateCreation;

  public function getIdDossierMedicale()
  {
    return $this->idDossierMedicale;
  }

  public function setIdDossierMedicale($idDossierMedicale)
  {
    $this->idDossierMedicale = $idDossierMedicale;

    return $this;
  }

  public function getDateCreation()
  {
    return $this->dateCreation;
  }

  public function setDateCreation($dateCreation)
  {
    $this->dateCreation = $dateCreation;

    return $this;
  }

  public function getDossierEnfant()
  {
    return $this->dossierEnfant;
  }

  public function setDossierEnfant($idDossierEnfant)
  {
    $this->idDossierEnfant = $idDossierEnfant;

    return $this;
  }

  public function getGroupeSanguin()
  {
    return $this->groupeSanguin;
  }

  public function setGroupeSanguin($groupeSanguin)
  {
    $this->groupeSanguin = $groupeSanguin;

    return $this;
  }

  public function getDateDernierVisite()
  {
    return $this->dateDernierVisite;
  }


  public function setDateDernierVisite($dateDernierVisite)
  {
    $this->dateDernierVisite = $dateDernierVisite;

    return $this;
  }
}
