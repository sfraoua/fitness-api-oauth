<?php

namespace AppBundle\Controller\Backoffice;

use AppBundle\Document\Muscle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    /**
     * @Route("/delete/{id}", name="back_muscle_delete")
     */
    public function deleteAction($id)
    {
        $muscleManager = $this->get('manager.muscle');

        $muscle = $muscleManager->get($id);
        if(null===$muscle){
            throw new NotFoundHttpException('Cant find Muscle');
        }
        $muscleManager->delete($muscle);

            return $this->redirectToRoute('back_muscle_index');
}
}
