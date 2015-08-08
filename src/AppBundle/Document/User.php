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
     * @MongoDB\ReferenceMany(targetDocument="OAuthBundle\Document\Client", cascade="all")
     */
    protected $clients;

    /**
     * @MongoDB\ReferenceMany(targetDocument="TrainingPlan", cascade="all")
     */
    protected $trainingPlans;

    public function __construct(){
        parent::__construct();
        $this->clients = new ArrayCollection();
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
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Add client
     *
     * @param Client $client
     */
    public function addClient(Client $client)
    {
        $this->clients[] = $client;
    }

    /**
     * Remove client
     *
     * @param Client $client
     */
    public function removeClient(Client $client)
    {
        $this->clients->removeElement($client);
    }
}
