<?php
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */

namespace AppBundle\DocumentInheritance;


use Symfony\Component\Security\Core\User\UserInterface;

interface TraceableInterface
{
    /**
     * @param UserInterface $user
     * @return mixed
     */
    public function setUser(UserInterface $user);

    /**
     * @return UserInterface
     */
    public function getUser();


}