<?php
namespace AppBundle\Document;

use AppBundle\DocumentInheritance\BaseDocument;
use AppBundle\DocumentInheritance\TraceableInterface;
use AppBundle\DocumentTrait\TraceableTrait;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;


/**
 * @MongoDB\Document
 * @ExclusionPolicy("all")
 *
 */
class Muscle extends BaseDocument implements TraceableInterface
{

    use TraceableTrait;

    /**
     * @MongoDB\Id
     * @Expose()
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
