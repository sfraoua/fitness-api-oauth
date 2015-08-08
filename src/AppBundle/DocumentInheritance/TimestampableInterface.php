<?php
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */

namespace AppBundle\DocumentInheritance;


use Symfony\Component\Security\Core\User\UserInterface;

interface TimestampableInterface
{

    public function getCreatedAt();
    public function setCreatedAt(\DateTime $createdAt);

    public function getUpdatedAt();
    public function setUpdatedAt(\DateTime $updatedAt);


}