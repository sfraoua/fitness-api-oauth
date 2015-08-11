<?php
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */

namespace AppBundle\Manager;


use CoreBundle\Manager\BaseManager;
use Doctrine\Common\Persistence\ObjectManager;

class MuscleManager extends BaseManager
{

    public function __construct(ObjectManager $om){
        parent::__construct($om);
        $this->repository = $om->getRepository('AppBundle:Muscle');
    }
}