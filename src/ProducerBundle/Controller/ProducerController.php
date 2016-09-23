<?php

namespace ProducerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ProducerBundle\Entity\Producer;
use ProducerBundle\Form\ProducerType;

/**
 * Producer controller.
 *
 */
class ProducerController extends Controller
{
    /**
     * Lists all Producer entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $producers = $em->getRepository('ProducerBundle:Producer')->findAll();

        return $this->render('producer/index.html.twig', array(
            'producers' => $producers,
        ));
    }

    /**
     * Creates a new Producer entity.
     *
     */
    public function newAction(Request $request)
    {
        $producer = new Producer();
        $form = $this->createForm('ProducerBundle\Form\ProducerType', $producer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producer);
            $em->flush();

            return $this->redirectToRoute('producer_show', array('id' => $producer->getId()));
        }

        return $this->render('producer/new.html.twig', array(
            'producer' => $producer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Producer entity.
     *
     */
    public function showAction(Producer $producer)
    {
        $deleteForm = $this->createDeleteForm($producer);

        return $this->render('producer/show.html.twig', array(
            'producer' => $producer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Producer entity.
     *
     */
    public function editAction(Request $request, Producer $producer)
    {
        $deleteForm = $this->createDeleteForm($producer);
        $editForm = $this->createForm('ProducerBundle\Form\ProducerType', $producer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producer);
            $em->flush();

            return $this->redirectToRoute('producer_edit', array('id' => $producer->getId()));
        }

        return $this->render('producer/edit.html.twig', array(
            'producer' => $producer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Producer entity.
     *
     */
    public function deleteAction(Request $request, Producer $producer)
    {
        $form = $this->createDeleteForm($producer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($producer);
            $em->flush();
        }

        return $this->redirectToRoute('producer_index');
    }

    /**
     * Creates a form to delete a Producer entity.
     *
     * @param Producer $producer The Producer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Producer $producer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('producer_delete', array('id' => $producer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
