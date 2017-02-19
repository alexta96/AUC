<?php

namespace AUCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class MailController extends Controller
{

  public function indexAction($name)
  {
      $message = \Swift_Message::newInstance()
          ->setContentType("text/html")
          ->setSubject('Hola')
          ->setFrom('proyectounion@gmail.com')
          ->setTo('proyectounion@gmail.com')
          ->setBody(
              $this->renderView(
                  // app/Resources/views/Emails/registration.html.twig
                  'Default/contacto.html.twig',
                  array('name' => $name)
              ),
              'text/html'
          )
          /*
           * If you also want to include a plaintext version of the message
          ->addPart(
              $this->renderView(
                  'Emails/registration.txt.twig',
                  array('name' => $name)
              ),
              'text/plain'
          )
          */
      ;
      $this->get('mailer')->send($message);

      return $this->render(...);
  }

}
