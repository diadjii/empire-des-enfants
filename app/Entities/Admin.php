<?php
namespace App\Entities;


use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="admin")
*/

class Admin extends User{

}
