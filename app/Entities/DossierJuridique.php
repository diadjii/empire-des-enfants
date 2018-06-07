<?php
namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="dossier_juridique")
*/
class DossierJuridique {
  /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @ORM\Column(name="id",type="integer")
  */
  private $idDossierJuridique;

  public function getIdDossierJuridique()
  {
    return $this->idDossierJuridique;
  }

  public function setIdDossierJuridique($idDossierJuridique)
  {
    $this->idDossierJuridique = $idDossierJuridique;
    return $this;
  }

}
