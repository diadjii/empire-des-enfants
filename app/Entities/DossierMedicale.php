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
  *@ORM\Column(type="datetime")
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

}
