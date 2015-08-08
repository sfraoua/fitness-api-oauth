<?php
namespace AppBundle\DocumentInheritance;

use AppBundle\DocumentInheritance\TranslatableNameDescriptionInterface;
use AppBundle\DocumentTrait\TimestampableTrait;
use AppBundle\DocumentTrait\TraceableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use Symfony\Component\Validator\Constraint as Assert;

use FOS\UserBundle\Model\User as BaseUser;
use OAuthBundle\Document\Client;


/**
 * @MongoDB\MappedSuperclass()
 *
 * @ExclusionPolicy("all")
 */
class BaseDocument implements TranslatableNameDescriptionInterface, TimestampableInterface
{
    use TimestampableTrait;

    /**
     * @MongoDB\String
     * @Expose
     */
    protected $nameEn;

    /**
     * @MongoDB\String
     * @Expose
     */
    protected $nameFr;

    /**
     * @MongoDB\String
     * @Expose
     */
    protected $nameSp;

    /**
     * @MongoDB\String
     * @Expose
     */
    protected $nameRu;

    /**
     * @MongoDB\String
     * @Expose
     */
    protected $nameCh;

    /**
     * @MongoDB\String
     * @Expose
     */
    protected $nameIt;


    /**
     * @MongoDB\String
     * @Expose
     */
    protected $descriptionEn;

    /**
     * @MongoDB\String
     * @Expose
     */
    protected $descriptionFr;

    /**
     * @MongoDB\String
     * @Expose
     */
    protected $descriptionSp;

    /**
     * @MongoDB\String
     * @Expose
     */
    protected $descriptionRu;

    /**
     * @MongoDB\String
     * @Expose
     */
    protected $descriptionCh;

    /**
     * @MongoDB\String
     * @Expose
     */
    protected $descriptionIt;

    public function __construct(){
        $this->setCreatedAt(new \DateTime());
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

    /**
     * @return string
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }

    /**
     * @param string $nameEn
     */
    public function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;
    }

    /**
     * @return string
     */
    public function getNameFr()
    {
        return $this->nameFr;
    }

    /**
     * @param string $nameFr
     */
    public function setNameFr($nameFr)
    {
        $this->nameFr = $nameFr;
    }

    /**
     * @return string
     */
    public function getNameSp()
    {
        return $this->nameSp;
    }

    /**
     * @param string $nameSp
     */
    public function setNameSp($nameSp)
    {
        $this->nameSp = $nameSp;
    }

    /**
     * @return string
     */
    public function getNameRu()
    {
        return $this->nameRu;
    }

    /**
     * @param string $nameRu
     */
    public function setNameRu($nameRu)
    {
        $this->nameRu = $nameRu;
    }

    /**
     * @return string
     */
    public function getNameCh()
    {
        return $this->nameCh;
    }

    /**
     * @param string $nameCh
     */
    public function setNameCh($nameCh)
    {
        $this->nameCh = $nameCh;
    }

    /**
     * @return string
     */
    public function getNameIt()
    {
        return $this->nameIt;
    }

    /**
     * @param string $nameIt
     */
    public function setNameIt($nameIt)
    {
        $this->nameIt = $nameIt;
    }

    /**
     * @return string
     */
    public function getDescriptionEn()
    {
        return $this->descriptionEn;
    }

    /**
     * @param string $descriptionEn
     */
    public function setDescriptionEn($descriptionEn)
    {
        $this->descriptionEn = $descriptionEn;
    }

    /**
     * @return string
     */
    public function getDescriptionFr()
    {
        return $this->descriptionFr;
    }

    /**
     * @param string $descriptionFr
     */
    public function setDescriptionFr($descriptionFr)
    {
        $this->descriptionFr = $descriptionFr;
    }

    /**
     * @return string
     */
    public function getDescriptionSp()
    {
        return $this->descriptionSp;
    }

    /**
     * @param string $descriptionSp
     */
    public function setDescriptionSp($descriptionSp)
    {
        $this->descriptionSp = $descriptionSp;
    }

    /**
     * @return string
     */
    public function getDescriptionRu()
    {
        return $this->descriptionRu;
    }

    /**
     * @param string $descriptionRu
     */
    public function setDescriptionRu($descriptionRu)
    {
        $this->descriptionRu = $descriptionRu;
    }

    /**
     * @return string
     */
    public function getDescriptionCh()
    {
        return $this->descriptionCh;
    }

    /**
     * @param string $descriptionCh
     */
    public function setDescriptionCh($descriptionCh)
    {
        $this->descriptionCh = $descriptionCh;
    }

    /**
     * @return string
     */
    public function getDescriptionIt()
    {
        return $this->descriptionIt;
    }

    /**
     * @param string $descriptionIt
     */
    public function setDescriptionIt($descriptionIt)
    {
        $this->descriptionIt = $descriptionIt;
    }

}
