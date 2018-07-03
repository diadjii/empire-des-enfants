<?php
namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
  private $typeConsultation;
  
  /**
   * @ORM\Column(type="string")
   */
  private $prescription;

  /**
   * @ORM\Column(type="string")
   */
  private $analyseComplementaire;

  /**
   * @ORM\Column(type="string")
   */
  private $groupeSanguin;

  /**
   * @ORM\Column(type="string")
   */
  private $diagnostique;

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

  public function getTypeConsultation()
  {
    return $this->typeConsultation;
  }

  public function setTypeConsultation($typeConsultation)
  {
    $this->typeConsultation = $typeConsultation;

    return $this;
  }

  public function getPrescription()
  {
    return $this->prescription;
  }
  
  public function setPrescription($prescription)
  {
    $this->prescription = $prescription;

    return $this;
  }

  public function getAnalyseComplementaire()
  {
    return $this->analyseComplementaire;
  }
  
  public function setAnalyseComplementaire($analyseComplementaire)
  {
    $this->analyseComplementaire = $analyseComplementaire;

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

  public function getDiagnostique()
  {
    return $this->diagnostique;
  }

  
  public function setDiagnostique($diagnostique)
  {
    $this->diagnostique = $diagnostique;

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
