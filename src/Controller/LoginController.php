<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]

     public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
         $error = $authenticationUtils->getLastAuthenticationError();

         // last username entered by the user
         $lastUsername = $authenticationUtils->getLastUsername();

         return $this->render('@EasyAdmin/page/login.html.twig',
        #return $this->render('login/index.html.twig', #
        [
        // parameters usually defined in Symfony login forms 
             
             'last_username' => $lastUsername,
             'error'         => $error,

             // OPTIONAL parameters to customize the login form:

             // the URL users are redirected to after the login (default: '/admin')
            //'target_path' => $this->generateUrl('admin'),
            'target_path' => '/admin',
            // the string used to generate the CSRF token. If you don't define
            // this parameter, the login form won't include a CSRF token
            'csrf_token_intention' => 'authenticate',
             // the label displayed for the Sign In form button (the |trans filter is applied to it)
             'sign_in_label' => 'Log in',
              // whether to enable or not the "forgot password?" link (default: false)
            'forgot_password_enabled' => true,
            // whether to enable or not the "remember me" checkbox (default: false)
            'remember_me_enabled' => true,
   
        ]);
    }
}