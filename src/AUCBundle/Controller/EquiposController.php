<?php

namespace AUCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AUCBundle\Entity\equipos;
use AUCBundle\Entity\jugadores;
use AUCBundle\Entity\entrenadores;
use AUCBundle\Form\entrenadoresType;
use Symfony\Component\HttpFoundation\Request;

class EquiposController extends Controller
{

    public function equipoAction($id_equipo)
    {

        $repository = $this->getDoctrine()->getRepository('AUCBundle:equipos');
        $equipo = $repository->findOneById($id_equipo);

        return $this->render('AUCBundle:Equipos:equipo.html.twig', array("equipo"=> $equipo));
    }
}
