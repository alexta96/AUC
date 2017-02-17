<?php

namespace AUCBundle\Controller;

use AUCBundle\Entity\entrenadores;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * entrenadores controller.
 *
 */
class entrenadoresController extends Controller
{
    /**
     * Lists all entrenadores entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entrenadores = $em->getRepository('AUCBundle:entrenadores')->findAll();

        return $this->render('entrenadores/index.html.twig', array(
            'entrenadores' => $entrenadores,
        ));
    }

    /**
     * Creates a new entrenadores entity.
     *
     */
    public function newAction(Request $request)
    {
        $entrenadores = new entrenadores();
        $form = $this->createForm('AUCBundle\Form\entrenadoresType', $entrenadores);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entrenadores);
            $em->flush($entrenadores);


            return $this->redirectToRoute('entrenadores_show', array('id' => $entrenadores->getId()));
        }

        return $this->render('entrenadores/new.html.twig', array(
            'entrenadores' => $entrenadores,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a entrenadore entity.
     *
     */
    public function showAction(entrenadores $entrenadores)
    {
        $deleteForm = $this->createDeleteForm($entrenadores);

        return $this->render('entrenadores/show.html.twig', array(
            'entrenadore' => $entrenadores,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing entrenadore entity.
     *
     */
    public function editAction(Request $request, entrenadores $entrenadores)
    {
        $deleteForm = $this->createDeleteForm($entrenadores);
        $editForm = $this->createForm('AUCBundle\Form\entrenadoresType', $entrenadores);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entrenadores_edit', array('id' => $entrenadore->getId()));
        }

        return $this->render('entrenadores/edit.html.twig', array(
            'entrenadores' => $entrenadores,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a entrenadore entity.
     *
     */
    public function deleteAction(Request $request, entrenadores $entrenadores)
    {
        $form = $this->createDeleteForm($entrenadores);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($entrenadores);
            $em->flush($entrenadores);
        }

        return $this->redirectToRoute('entrenadores_index');
    }

    /**
     * Creates a form to delete a entrenadore entity.
     *
     * @param entrenadores $entrenadore The entrenadore entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(entrenadores $entrenadores)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('entrenadores_delete', array('id' => $entrenadores->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
