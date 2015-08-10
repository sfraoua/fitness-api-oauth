<?php
namespace AppBundle\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use FOS\UserBundle\Model\User as BaseUser;
use OAuthBundle\Document\Client;


/**
 * @MongoDB\Document
 */
class User extends BaseUser
{
    /**
     * @MongoDB\Id
     */
    protected $id;


    /**
     * @MongoDB\String()
     */
    protected $firstName;

    /**
     * @MongoDB\String()
     */
    protected $lastName;

    /**
     * @MongoDB\String()
     */
    protected $gender;

    /**
     * @MongoDB\String()
     */
    protected $hometown;

    /**
     * @MongoDB\Date()
     */
    protected $birthday;

    /**
     * @MongoDB\String()
     */
    protected $facebookId;

    /**
     * @MongoDB\String()
     */
    protected $locale;

    /**
     * @MongoDB\Boolean()
     */
    protected $autoPassword;
    /**
     * @MongoDB\Boolean()
     */
    protected $autoUsername;


    /**
     * @MongoDB\ReferenceMany(targetDocument="TrainingPlan", cascade="all")
     */
    protected $trainingPlans;

    public function __construct(){
        parent::__construct();
        $this->addRole('ROLE_USER');
        $this->autoPassword = false;
        $this->autoUsername = false;
    }

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAutoPassword()
    {
        return $this->autoPassword;
    }

    /**
     * @param mixed $autoPassword
     */
    public function setAutoPassword($autoPassword)
    {
        $this->autoPassword = $autoPassword;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * @param mixed $facebookId
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param mixed $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return mixed
     */
    public function getAutoUsername()
    {
        return $this->autoUsername;
    }

    /**
     * @param mixed $autoUsername
     */
    public function setAutoUsername($autoUsername)
    {
        $this->autoUsername = $autoUsername;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getHometown()
    {
        return $this->hometown;
    }

    /**
     * @param mixed $hometown
     */
    public function setHometown($hometown)
    {
        $this->hometown = $hometown;
    }



}
