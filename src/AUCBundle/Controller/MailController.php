<?php

namespace AUCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class MailController extends Controller
{

  public function contactoAction(Request $request)
  {
    $this->get('request')->request->get('name');
    $this->get('request')->request->get('apellidos');
    $this->get('request')->request->get('mail');
    $this->get('request')->request->get('asunto');
    $this->get('request')->request->get('texto');

      $message = \Swift_Message::newInstance()
          ->setContentType("text/html")
          ->setSubject('Hola')
          ->setFrom('proyectounion@gmail.com')
          ->setTo('proyectounion@gmail.com')
          ->setBody(
              $this->renderView(
                  // app/Resources/views/Emails/registration.html.twig
                  'Default/mail.html.twig',
                  array('name' => $name, 'apellidos' => $apellidos, 'mail' => $mail, 'asunto' => $asunto, 'texto' => $texto,)
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
      $this->get('mensaje')->send($message);

      return new Response();
  }

}
