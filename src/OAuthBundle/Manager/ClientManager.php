<?php
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */

namespace OAuthBundle\Manager;


use CoreBundle\Manager\BaseManager;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ODM\MongoDB\DocumentRepository;

class ClientManager extends BaseManager
{

    public function __construct(ObjectManager $om){
        parent::__construct($om);
        $this->repository = $om->getRepository('OAuthBundle:Client');
    }

}