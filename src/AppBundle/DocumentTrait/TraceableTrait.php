<?php
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */

namespace AppBundle\DocumentTrait;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Security\Core\User\UserInterface;

trait TraceableTrait
{
    /**
     * @MongoDB\ReferenceOne(targetDocument="AppBundle\Document\User", cascade="persist")
     */
    private $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserInterface $user
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;
    }



}