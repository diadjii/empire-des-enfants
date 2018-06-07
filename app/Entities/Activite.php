<?php

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="activite")
*/
class Activite{
  /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @ORM\Column(type="integer")
  */
  private $idActivite;

  public function getIdActivite()
  {
    return $this->idActivite;
  }

  public function setIdActivite($idActivite)
  {
    $this->idActivite = $idActivite;
    return $this;
  }

}

 ?>
