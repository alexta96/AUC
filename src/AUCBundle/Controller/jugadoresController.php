<?php

namespace AUCBundle\Controller;

use AUCBundle\Entity\jugadores;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Jugadores controller.
 *
 */
class jugadoresController extends Controller
{
    /**
     * Lists all jugadores entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $jugadores = $em->getRepository('AUCBundle:jugadores')->findAll();

        return $this->render('jugadores/index.html.twig', array(
            'jugadores' => $jugadores,
        ));
    }

    /**
     * Creates a new jugadore entity.
     *
     */
    public function newAction(Request $request)
    {
        $jugadores = new jugadores();
        $form = $this->createForm('AUCBundle\Form\jugadoresType', $jugadores);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jugadores);
            $em->flush($jugadores);

            return $this->redirectToRoute('jugadores_show', array('id' => $jugadores->getId()));
        }

        return $this->render('jugadores/new.html.twig', array(
            'jugadores' => $jugadores,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a jugadore entity.
     *
     */
    public function showAction(jugadores $jugadores)
    {
        $deleteForm = $this->createDeleteForm($jugadores);

        return $this->render('jugadores/show.html.twig', array(
            'jugadores' => $jugadores,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing jugadore entity.
     *
     */
    public function editAction(Request $request, jugadores $jugadores)
    {
        $deleteForm = $this->createDeleteForm($jugadores);
        $editForm = $this->createForm('AUCBundle\Form\jugadoresType', $jugadores);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jugadores_edit', array('id' => $jugadores->getId()));
        }

        return $this->render('jugadores/edit.html.twig', array(
            'jugadores' => $jugadores,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a jugadore entity.
     *
     */
    public function deleteAction(Request $request, jugadores $jugadores)
    {
        $form = $this->createDeleteForm($jugadores);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($jugadores);
            $em->flush($jugadores);
        }

        return $this->redirectToRoute('jugadores_index');
    }

    /**
     * Creates a form to delete a jugadore entity.
     *
     * @param jugadores $jugadore The jugadore entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(jugadores $jugadores)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('jugadores_delete', array('id' => $jugadores->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
