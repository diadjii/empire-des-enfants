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

  /**
   * @ORM\Column(type="string")
   */
  private $dossierEnfant;

  public function setIdDossierJuridique($idDossierJuridique)
  {
    $this->idDossierJuridique = $idDossierJuridique;
    return $this;
  }


    /**
     * Get the value of Dossier Enfant
     *
     * @return mixed
     */
    public function getDossierEnfant()
    {
        return $this->dossierEnfant;
    }

    /**
     * Set the value of Dossier Enfant
     *
     * @param mixed dossierEnfant
     *
     * @return self
     */
    public function setDossierEnfant($dossierEnfant)
    {
        $this->dossierEnfant = $dossierEnfant;

        return $this;
    }

}
