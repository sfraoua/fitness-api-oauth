<?php
namespace AppBundle\Document;

use AppBundle\DocumentInheritance\BaseDocument;
use AppBundle\DocumentInheritance\TraceableInterface;
use AppBundle\DocumentTrait\TraceableTrait;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;


/**
 * @MongoDB\Document
 */
class TrainingPlan extends BaseDocument implements TraceableInterface
{

    use TraceableTrait;
    /**
     * @MongoDB\Id
     */
    protected $id;


    /**
     * @MongoDB\ReferenceMany(targetDocument="TrainingPlanDay", cascade="all")
     */
    protected $days;

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
