<?php

namespace AUCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AUCBundle\Entity\noticias;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AUCBundle:Default:index.html.twig');
    }
    public function futbolconvencionalAction()
    {
        return $this->render('AUCBundle:Default:futbolconvencional.html.twig');
    }
    public function futbolonceAction()
    {
        return $this->render('AUCBundle:Default:futbolonce.html.twig');
    }
    public function futbolsillaAction()
    {
        return $this->render('AUCBundle:Default:futbolsilla.html.twig');
    }
    public function contactoAction()
    {
        return $this->render('AUCBundle:Default:contacto.html.twig');
    }
    public function extraAction()
    {
        return $this->render('AUCBundle:Default:extra.html.twig');
    }

    public function nosotrosAction()
    {
        return $this->render('AUCBundle:Default:quienes.html.twig');
    }
    public function adaptadoAction()
    {
        return $this->render('AUCBundle:Default:futboladaptado.html.twig');
    }

    public function allAction()
    {
        $repository = $this->getDoctrine()->getRepository('AUCBundle:noticias');
        $noticias = $repository->findAll();
        return $this->render('AUCBundle:Default:index.html.twig', array("noticias"=>$noticias));
    }

    public function noticiaAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AUCBundle:noticias');
        $noticias = $repository->findOneById($id);

        return $this->render('AUCBundle:Default:noticia.html.twig', array("noticias"=> $noticias));
    }
}
