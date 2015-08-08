<?php
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */

namespace CoreBundle\Manager;


interface ManagerInterface
{
    /*
    * Persist an flush entity
    */
    public function doFlush($entity);

    /*
    * Return all records
    */
    public function getAll();

    /*
    * Return specific record
    */
    public function get($id);

    /*
    * Return records by criteria
    */
    public function getBy(array $criteria);
}