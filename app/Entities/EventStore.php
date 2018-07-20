<?php

namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;

/**
* @ORM\Entity
* @ORM\Table(name="event_store")
*/
class EventStore
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue
    * @ORM\Column(name="id",type="integer")
    */
    private $id;
    
    /**
    * @ORM\Column(type="integer")
    */
    private $userId; 
    
    /**
     * @ORM\Column(type="string")
     */
    private $typeAction;
    
    /**
     * @ORM\Column(type="string")
     */
    private  $dateTime;
    
    /**
     * @ORM\Column(type="text",nullable=true)
     */
    private $description;
    
     public function getId()
    {
        return $this->id;
    }
    
    /**
    * Set the value of id
    *
    * @return  self
    */ 
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
    * Get the value of userId
    */ 
    public function getUserId()
    {
        return $this->userId;
    }
    
    /**
    * Set the value of userId
    *
    * @return  self
    */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;
        
        return $this;
    }
    
    /**
    * Get the value of typeAction
    */ 
    public function getTypeAction()
    {
        return $this->typeAction;
    }
    
    /**
    * Set the value of typeAction
    *
    * @return  self
    */ 
    public function setTypeAction($typeAction)
    {
        $this->typeAction = $typeAction;
        
        return $this;
    }

    /**
     * Get the value of dateTime
     */ 
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set the value of dateTime
     *
     * @return  self
     */ 
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}