<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/user")
 */
class UserController extends Controller
{
    /**
     * @Route("/client", name="user_profile_authentication_clients")
     */
    public function indexAction(Request $request)
    {
        $clientHandler = $this->get('oauth.client.form_handler');
        if($clientHandler->createNew()){
            return $this->redirectToRoute('user_profile_authentication_clients');
        }
        $client = $this->get('oauth.client.manager')->getOneBy(array('name'=>'fitness'));

        return $this->render('FOSUserBundle:Profile:client.html.twig', array('form'=>$clientHandler->getForm()->createView(),
            'client'=>$client));
    }
}
