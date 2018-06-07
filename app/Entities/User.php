<?php
namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;

/**
* @ORM\Entity
* @ORM\InheritanceType("JOINED")
* @ORM\Table(name="user",uniqueConstraints={@ORM\UniqueConstraint(name="ukLogin",columns={"login"} )} )
* @DiscriminatorColumn(name="user_type", type="string")
*/

abstract class User{
  /**
  * @ORM\Id
  * @ORM\GeneratedValue
  * @ORM\Column(type="integer")
  */
  protected $id;

  /**
  * @ORM\Column(type="string")
  */
  protected $login;

  /**
  * @ORM\Column(type="string")
  */
  protected $password;

  /**
  * @ORM\Column(type="string",nullable=true)
  */
  protected $nom;

  /**
  * @ORM\Column(type="string",nullable=true)
  */
  protected $prenom;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  public function getLogin()
  {
    return $this->login;
  }


  public function setLogin($login)
  {
    $this->login = $login;
    return $this;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  public function getNom()
  {
    return $this->nom;
  }

  public function setNom($nom)
  {
    $this->nom = $nom;
    return $this;
  }

  public function getPrenom()
  {
    return $this->prenom;
  }

  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;
    return $this;
  }

}
?>
