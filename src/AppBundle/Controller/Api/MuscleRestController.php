<?php

namespace AppBundle\Controller\Api;

use AppBundle\Document\Muscle;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcher;
use JMS\Serializer\Annotation\ExclusionPolicy;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Acl\Exception\Exception;

class MuscleRestController extends FOSRestController
{
    /**
     * @Post
     * @RequestParam(name="nameFr", nullable=true, strict=true, description="Name French.")
     * @RequestParam(name="nameEn", nullable=true, strict=true, description="Name English.")
     * @RequestParam(name="nameSp", nullable=true, strict=true, description="Name Spanish.")
     * @RequestParam(name="nameRu", nullable=true, strict=true, description="Name Russian.")
     * @RequestParam(name="nameCh", nullable=true, strict=true, description="Name Chinese.")
     * @RequestParam(name="nameIt", nullable=true, strict=true, description="Name Italian.")
     *
     * @RequestParam(name="descriptionFr", nullable=true, strict=true, description="Description French.")
     * @RequestParam(name="descriptionEn", nullable=true, strict=true, description="Description English.")
     * @RequestParam(name="descriptionSp", nullable=true, strict=true, description="Description Spanish.")
     * @RequestParam(name="descriptionRu", nullable=true, strict=true, description="Description Russian.")
     * @RequestParam(name="descriptionCh", nullable=true, strict=true, description="Description Chinese.")
     * @RequestParam(name="descriptionIt", nullable=true, strict=true, description="Description Italian.")
     *
     * @param ParamFetcher $paramFetcher
     * @return \Symfony\Component\Form\FormInterface
     */

    public function allAction(ParamFetcher $paramFetcher)
    {
          //$data = ['name'=>$paramFetcher->get('name')];


//        $formHandler = $this->get('oauth.client.form_handler');
//            $formHandler->getForm()->submit($data);
//        if(!$formHandler->createNew()){
//        }

        $muscle = new Muscle();
        $muscle->setNameFr('Muscle 1');
        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($muscle);
        $dm->flush();
        return $muscle;

    }
}
