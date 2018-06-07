<?php

namespace App\Entities;


use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="super_admin")
*/
class SuperAdmin extends User{

}
