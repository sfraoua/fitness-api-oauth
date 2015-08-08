<?php
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */

namespace OAuthBundle\Controller;
use FOS\OAuthServerBundle\Controller\AuthorizeController as BaseAuthorizeController;
use OAuthBundle\Document\Client;
use OAuthBundle\Form\Model\Authorize;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class AuthorizeController extends  BaseAuthorizeController
{
    public function authorizeAction(Request $request)
    {
        return parent::authorizeAction($request);
//        if (!$request->get('client_id')) {
//            throw new NotFoundHttpException("Client id parameter {$request->get('client_id')} is missing.");
//        }
//
//        $clientManager = $this->container->get('fos_oauth_server.client_manager.default');
//        $client = $clientManager->findClientByPublicId($request->get('client_id'));
//
//        if (!($client instanceof Client)) {
//            throw new NotFoundHttpException("Client {$request->get('client_id')} is not found.");
//        }
//
//        $user = $this->container->get('security.context')->getToken()->getUser();
//
//        $form = $this->container->get('o_auth.authorize.form');
//        $formHandler = $this->container->get('o_auth.authorize.form_handler');
//
//        $authorize = new Authorize();
//
//        if (($response = $formHandler->process($authorize)) !== false) {
//            return $response;
//        }
//
//        return $this->container->get('templating')->renderResponse('Authorize/authorize.html.twig', array(
//            'form' => $form->createView(),
//            'client' => $client,
//        ));
    }
}