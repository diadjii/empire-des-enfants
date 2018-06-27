<?php
namespace App\Entities;

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

  /**
  *@ORM\Column(type="text")
  */
  private $nomActivite;

  /**
  *@ORM\Column(type="string")
  */
  private $descActivite;

  /**
  * @ORM\Column(type="string")
  */
  private $dateCreation;

  /**
  * @ORM\Column(type="string")
  */
  private $dateActivite;

  /**
  * @ORM\Column(type="string")
  */
  private $color;

  /**
  * @ORM\Column(type="string")
  */
  private $bgColor;

  public function getIdActivite()
  {
    return $this->idActivite;
  }

  public function setIdActivite($idActivite)
  {
    $this->idActivite = $idActivite;
    return $this;
  }


    /**
     * Get the value of Nom Activite
     *
     * @return mixed
     */
    public function getNomActivite()
    {
        return $this->nomActivite;
    }

    /**
     * Set the value of Nom Activite
     *
     * @param mixed nomActivite
     *
     * @return self
     */
    public function setNomActivite($nomActivite)
    {
        $this->nomActivite = $nomActivite;

        return $this;
    }

    /**
     * Get the value of Desc Activite
     *
     * @return mixed
     */
    public function getDescActivite()
    {
        return $this->descActivite;
    }

    /**
     * Set the value of Desc Activite
     *
     * @param mixed descActivite
     *
     * @return self
     */
    public function setDescActivite($descActivite)
    {
        $this->descActivite = $descActivite;

        return $this;
    }

    /**
     * Get the value of Date Creation
     *
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of Date Creation
     *
     * @param mixed dateCreation
     *
     * @return self
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

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
     * Get the value of Color
     *
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of Color
     *
     * @param mixed color
     *
     * @return self
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of Bg Color
     *
     * @return mixed
     */
    public function getBgColor()
    {
        return $this->bgColor;
    }

    /**
     * Set the value of Bg Color
     *
     * @param mixed bgColor
     *
     * @return self
     */
    public function setBgColor($bgColor)
    {
        $this->bgColor = $bgColor;

        return $this;
    }

}

 ?>
