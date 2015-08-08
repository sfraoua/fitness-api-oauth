<?php
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SecurityController
 * @package AppBundle\Controller
 */
class OAuthSecurityController extends Controller
{
    /**
     * @Route("/oauth/v2/auth_login", name="auth_login_route")
     */
    public function oauthLoginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'security/login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

    /**
     * @Route("/oauth/v2/auth_login_check", name="auth_login_check")
     */
    public function oAuthLoginCheckAction()
    {
        // this controller will not be executed,
        // as the route is handled by the Security system
    }
}