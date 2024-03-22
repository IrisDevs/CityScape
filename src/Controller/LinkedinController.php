<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LinkedinController extends AbstractController
{
    /**
     * @Route("/connect/linkedin", name="connect_linkedin_start")
     */

     #[Route(path: '/connect/linkedin', name: 'connect_linkedin_start')]
    public function connectAction(ClientRegistry $clientRegistry)
    {
        return $clientRegistry
            ->getClient('linkedin_main') // key used in config/packages/knpu_oauth2_client.yaml
            ->redirect(['openid', 'email', 'profile'], []);
    }

    /**
     * After going to linkedin, you're redirected back here
     * because this is the "redirect_route" you configured
     * in config/packages/knpu_oauth2_client.yaml
     *
     * @Route("/connect/linkedin/check", name="connect_linkedin_check")
     */

     #[Route(path: '/connect/linkedin/check', name: 'connect_linkedin_check')]
    public function connectCheckAction(Request $request, ClientRegistry $clientRegistry)
    {
        
    
    }

    
}