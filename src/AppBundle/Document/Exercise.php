<?php
namespace AppBundle\Document;

use AppBundle\DocumentInheritance\BaseDocument;
use AppBundle\DocumentInheritance\TraceableInterface;
use AppBundle\DocumentTrait\TraceableTrait;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;


/**
 * @MongoDB\Document
 */
class Exercise extends BaseDocument implements TraceableInterface
{

    use TraceableTrait;
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Ability", cascade="all")
     */
    protected $abilities;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Muscle", cascade="all")
     */
    protected $muscles;

    /**
     * @MongoDB\ReferenceMany(targetDocument="ExerciseStep", cascade="all")
     */
    protected $steps;

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
