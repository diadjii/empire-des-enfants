<?php
namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="dossier_scolaire")
*/

class DossierScolaire {
  /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @ORM\Column(name="id",type="integer")
  */
  private $idDossierScolaire;

  public function getIdDossierScolaire()
  {
    return $this->idDossierScolaire;
  }

  public function setIdDossierScolaire($idDossierScolaire)
  {
    $this->idDossierScolaire = $idDossierScolaire;
    return $this;
  }

}
