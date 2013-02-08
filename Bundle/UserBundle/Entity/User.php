<?php

namespace Snappminds\Security\Bundle\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=20)
     */    
    private $lastname;

    /**
     * @ORM\Column(type="string", length=20)
     */        
    private $firstname;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */        
    private $personalID;    
    
    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */        
    private $phoneNumber;    

    /**
     * @ORM\Column(type="text", nullable=true)
     */        
    private $notes;    

    public function __construct()
    {
        parent::__construct();
        $this->setEnabled(true);
    }

    public function getId()
    {
        return $this->id;
    }    
    
    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }    
    
    public function getPersonalID()
    {
        return $this->personalID;
    }

    public function setPersonalID($personalID)
    {
        $this->personalID = $personalID;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function setNotes($notes)
    {
        $this->notes = $notes;
    }    
}