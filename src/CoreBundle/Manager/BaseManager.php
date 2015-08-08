<?php
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */

namespace CoreBundle\Manager;


use Doctrine\Common\Persistence\ObjectManager;

abstract class BaseManager implements ManagerInterface
{
    protected $om;

    protected $repository;

    public function __construct(ObjectManager $om){
        $this->om =$om;
    }

    public function doFlush($entity)
    {
        $this->om->persist($entity);
        $this->om->flush();
    }

    public function getAll()
    {
        return $this->repository->findAll();
    }

    public function get($id)
    {
        return $this->repository->find($id);
    }

    public function getBy(array $criteria)
    {
        return $this->repository->findBy($criteria);
    }


}