<?php
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */

namespace OAuthBundle\Form\Handler;


use CoreBundle\Form\Handler\HandlerInterface;
use CoreBundle\Manager\ManagerInterface;
use OAuthBundle\Document\Client;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class ClientHandler implements HandlerInterface
{
    private $form;
    private $request;
    private $token;
    private $manager;

    public function  __construct(FormInterface $form, Request $request, TokenStorageInterface $token, ManagerInterface $manager){
        $this->form = $form;
        $this->request = $request;
        $this->token = $token;
        $this->manager = $manager;
    }

    public function createNew()
    {
        $client = new Client();
        $client->setUser($this->token->getToken()->getUser());
        $this->form->setData($client);
        $this->form->handleRequest($this->request);


        if($this->form->isSubmitted() && $this->form->isValid()){
            $this->createNewSuccess();
            return true;
        }

        return false;
    }

    protected function createNewSuccess()
    {
        $client = $this->form->getData();
        $user = $client->getUser();
        $user->addClient($client);
        $this->manager->doFlush($user);
    }

    /**
     * @return FormInterface
     */
    public function getForm()
    {
        return $this->form;
    }

}