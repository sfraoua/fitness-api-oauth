<?php
namespace AppBundle\Document;

use AppBundle\DocumentInheritance\BaseDocument;
use AppBundle\DocumentInheritance\TraceableInterface;
use AppBundle\DocumentTrait\TraceableTrait;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use FOS\UserBundle\Model\User as BaseUser;


/**
 * @MongoDB\Document
 */
class Weight extends BaseDocument implements TraceableInterface
{
    use TraceableTrait;

    /**
     * @MongoDB\Id
     */
    protected $id;


    public function __construct(){
        parent::__construct();
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

    
}
