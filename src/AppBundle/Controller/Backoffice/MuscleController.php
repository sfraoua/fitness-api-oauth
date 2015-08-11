<?php

namespace AppBundle\Controller\Backoffice;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/muscles")
 */
class MuscleController extends Controller
{
    /**
     * @Route("/", name="back_muscle_index")
     */
    public function indexAction(Request $request)
    {
        $muscleManager = $this->get('manager.muscle');


        return $this->render('backoffice/muscle/index.html.twig', array('muscles'=>$muscleManager->getAll()));
    }
    /**
     * @Route("/add", name="back_muscle_add")
     */
    public function addAction(Request $request)
    {
        $muscleHandler = $this->get('handler.muscle');
        if($muscleHandler->createNew()){
            return $this->redirectToRoute('back_muscle_index');
        }

        return $this->render('backoffice/muscle/add.html.twig', array('form'=>$muscleHandler->getForm()->createView()));
    }
}
