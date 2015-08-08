<?php
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */

namespace AppBundle\Listener;


use AppBundle\DocumentInheritance\TraceableInterface;
use Doctrine\ODM\MongoDB\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class PrePersistListener
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage){
        $this->tokenStorage = $tokenStorage;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $document = $args->getDocument();
        ($document instanceof TraceableInterface)?$document->setUser($this->tokenStorage->getToken()->getUser()):'';
    }
}