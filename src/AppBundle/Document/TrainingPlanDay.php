<?php
namespace AppBundle\Document;

use AppBundle\DocumentInheritance\BaseDocument;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;


/**
 * @MongoDB\Document
 */
class TrainingPlanDay extends BaseDocument
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Exercise", cascade="all")
     */
    protected $exercises;

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
