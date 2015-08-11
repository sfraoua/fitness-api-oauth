<?php
namespace OAuthBundle\GrantExtension;
/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */
use AppBundle\Document\User;
use Doctrine\Common\Persistence\ObjectManager;
use FOS\OAuthServerBundle\Storage\GrantExtensionInterface;
use OAuth2\Model\IOAuth2Client;
use OAuth2\OAuth2;
use OAuth2\OAuth2ServerException;
use Symfony\Component\Security\Acl\Exception\Exception;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class AndroidGrantExtension implements GrantExtensionInterface
{
    private $om;
    private $repository;
    const FACEBOOK_API_URL = "https://graph.facebook.com/me?";

    public function __construct(ObjectManager $om){
        $this->om = $om;
        $this->repository = $this->om->getRepository('AppBundle:User');
    }

    /*
     * {@inheritdoc}
     */
    public function checkGrantExtension(IOAuth2Client $client, array $inputData, array $authHeaders)
    {


        if(isset($inputData['facebook_token']) && isset($inputData['facebook_id'])) {
            return $this->firstLogin($inputData);
        }elseif(isset($inputData['facebook_id']) && isset($inputData['user_id'])){
            return $this->login($inputData);
        }else{
            throw new OAuth2ServerException(OAuth2::HTTP_BAD_REQUEST, OAuth2::ERROR_INVALID_REQUEST, 'Missing parameters !');
        }

        return false; // No number guessed, the grant will fail
    }

    private function login($inputData)
    {
        $user = $this->repository->findOneBy(array('id' => $inputData['user_id'], 'facebookId' => $inputData['facebook_id']));
        if($user === null){
            throw new OAuth2ServerException(OAuth2::HTTP_BAD_REQUEST, OAuth2::ERROR_INVALID_REQUEST, 'Facebook id don\'t match app user id');
        }

        return array(
            'data' => $user
        );
    }

    private function firstLogin($inputData)
    {

        //  Initiate curl
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,AndroidGrantExtension::FACEBOOK_API_URL.'access_token='.$inputData['facebook_token']);

        $me=json_decode(curl_exec($ch));

        if(isset($me->error)){
            throw new OAuth2ServerException(OAuth2::HTTP_BAD_REQUEST, OAuth2::ERROR_INVALID_REQUEST, 'Invalid Facebook OAuth access token');
        }

        if($inputData['facebook_id'] != $me->id){
            throw new OAuth2ServerException(OAuth2::HTTP_BAD_REQUEST, OAuth2::ERROR_INVALID_REQUEST, 'Facebook OAuth access token don\'t match facebook_id');
        }

        $user = $this->repository->findOneBy(array('facebookId' => $me->id));
        if($user === null){

            $user = new User();
            $user->setFacebookId($me->id);
            $user->setFirstName($me->first_name);
            $user->setLastName($me->last_name);
            $user->setGender($me->gender);
            if(!empty($me->birthday)) {
                $exploded = explode('/', $me->birthday);
                $date= new \DateTime();
                $date->setDate($exploded[2],$exploded[0], $exploded[1]);
                $user->setBirthday($date);

            }
            if(!empty($me->hometown)){
                $user->setHometown($me->hometown->name);
            }
            $user->setEmail($me->email);
            $user->setUsername('guest-'.substr(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36), 0, 6));
            $user->setAutoUsername(true);
            $user->setPlainPassword(substr(base_convert(sha1(uniqid(mt_rand(), true)), 16, 36), 0, 7));
            $user->setAutoPassword(true);
            $user->setEnabled(true);
            $this->om->persist($user);
            $this->om->flush();
        }
        return array(
            'data' => $user
        );
    }

}