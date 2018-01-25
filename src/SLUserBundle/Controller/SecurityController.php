<?php
// src/SL/UserBundle/Controller/SecurityController.php;

namespace SLUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
/**
 * Description of DefaultController
 *
 * @author Hazem
 */
class SecurityController extends Controller{
     public function loginAction(Request $request)
     {
      
        $session = $request->getSession();
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }     
        
           return $this->render('SLUserBundle:Authenticator:login.html.twig',array(
               'error' => $error,
               'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                   ));
        
     }
}

?>
