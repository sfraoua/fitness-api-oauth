<?php
namespace OAuthBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

use Doctrine\ODM\MongoDB\Mapping\Annotations\Collection;
use FOS\OAuthServerBundle\Document\Client as BaseClient;
use OAuth2\OAuth2;
use Symfony\Component\Security\Core\User\UserInterface;


use Symfony\Component\Validator\Constraints as Assert;

/**
 * @MongoDB\Document
 */
class Client extends BaseClient
{
    const GRANT_TYPE_ANDROID_APP  = 'http://workout.dev/grants/android_app';

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     *
     * @MongoDB\String
     */
    protected $name;

    /**
     *
     * @MongoDB\Collection()
     */
    protected $allowedOrigins = array();

    public function __construct(){
        parent::__construct();
        $this->allowedGrantTypes = array(
            OAuth2::GRANT_TYPE_AUTH_CODE,
            OAuth2::GRANT_TYPE_IMPLICIT,
            Client::GRANT_TYPE_ANDROID_APP,
        );
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set allowedOrigins
     *
     * @param Collection $allowedOrigins
     * @return self
     */
    public function setAllowedOrigins($allowedOrigins)
    {
        $this->allowedOrigins = $allowedOrigins;
        return $this;
    }

    /**
     * Get allowedOrigins
     *
     * @return Collection $allowedOrigins
     */
    public function getAllowedOrigins()
    {
        return $this->allowedOrigins;
    }
}
