<?php

namespace ClientsOrderStatusBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClientsOrderStatusBundle\Entity\ClientsOrderStatus;
use ClientsOrderStatusBundle\Form\ClientsOrderStatusType;

/**
 * ClientsOrderStatus controller.
 *
 */
class ClientsOrderStatusController extends Controller
{
    /**
     * Lists all ClientsOrderStatus entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clientsOrderStatuses = $em->getRepository('ClientsOrderStatusBundle:ClientsOrderStatus')->findAll();

        return $this->render('clientsorderstatus/index.html.twig', array(
            'clientsOrderStatuses' => $clientsOrderStatuses,
        ));
    }

    /**
     * Creates a new ClientsOrderStatus entity.
     *
     */
    public function newAction(Request $request)
    {
        $clientsOrderStatus = new ClientsOrderStatus();
        $form = $this->createForm('ClientsOrderStatusBundle\Form\ClientsOrderStatusType', $clientsOrderStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clientsOrderStatus);
            $em->flush();

            return $this->redirectToRoute('clientsorderstatus_show', array('id' => $clientsOrderStatus->getId()));
        }

        return $this->render('clientsorderstatus/new.html.twig', array(
            'clientsOrderStatus' => $clientsOrderStatus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ClientsOrderStatus entity.
     *
     */
    public function showAction(ClientsOrderStatus $clientsOrderStatus)
    {
        $deleteForm = $this->createDeleteForm($clientsOrderStatus);

        return $this->render('clientsorderstatus/show.html.twig', array(
            'clientsOrderStatus' => $clientsOrderStatus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ClientsOrderStatus entity.
     *
     */
    public function editAction(Request $request, ClientsOrderStatus $clientsOrderStatus)
    {
        $deleteForm = $this->createDeleteForm($clientsOrderStatus);
        $editForm = $this->createForm('ClientsOrderStatusBundle\Form\ClientsOrderStatusType', $clientsOrderStatus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clientsOrderStatus);
            $em->flush();

            return $this->redirectToRoute('clientsorderstatus_edit', array('id' => $clientsOrderStatus->getId()));
        }

        return $this->render('clientsorderstatus/edit.html.twig', array(
            'clientsOrderStatus' => $clientsOrderStatus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ClientsOrderStatus entity.
     *
     */
    public function deleteAction(Request $request, ClientsOrderStatus $clientsOrderStatus)
    {
        $form = $this->createDeleteForm($clientsOrderStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($clientsOrderStatus);
            $em->flush();
        }

        return $this->redirectToRoute('clientsorderstatus_index');
    }

    /**
     * Creates a form to delete a ClientsOrderStatus entity.
     *
     * @param ClientsOrderStatus $clientsOrderStatus The ClientsOrderStatus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ClientsOrderStatus $clientsOrderStatus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clientsorderstatus_delete', array('id' => $clientsOrderStatus->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
