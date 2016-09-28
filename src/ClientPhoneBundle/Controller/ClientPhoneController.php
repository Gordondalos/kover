<?php

namespace ClientPhoneBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClientPhoneBundle\Entity\ClientPhone;
use ClientPhoneBundle\Form\ClientPhoneType;

/**
 * ClientPhone controller.
 *
 */
class ClientPhoneController extends Controller
{
    /**
     * Lists all ClientPhone entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clientPhones = $em->getRepository('ClientPhoneBundle:ClientPhone')->findAll();

        return $this->render('clientphone/index.html.twig', array(
            'clientPhones' => $clientPhones,
        ));
    }

    /**
     * Creates a new ClientPhone entity.
     *
     */
    public function newAction(Request $request)
    {
        $clientPhone = new ClientPhone();
        $form = $this->createForm('ClientPhoneBundle\Form\ClientPhoneType', $clientPhone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clientPhone);
            $em->flush();

            return $this->redirectToRoute('clientphone_show', array('id' => $clientPhone->getId()));
        }

        return $this->render('clientphone/new.html.twig', array(
            'clientPhone' => $clientPhone,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ClientPhone entity.
     *
     */
    public function showAction(ClientPhone $clientPhone)
    {
        $deleteForm = $this->createDeleteForm($clientPhone);

        return $this->render('clientphone/show.html.twig', array(
            'clientPhone' => $clientPhone,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ClientPhone entity.
     *
     */
    public function editAction(Request $request, ClientPhone $clientPhone)
    {
        $deleteForm = $this->createDeleteForm($clientPhone);
        $editForm = $this->createForm('ClientPhoneBundle\Form\ClientPhoneType', $clientPhone);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clientPhone);
            $em->flush();

            return $this->redirectToRoute('clientphone_edit', array('id' => $clientPhone->getId()));
        }

        return $this->render('clientphone/edit.html.twig', array(
            'clientPhone' => $clientPhone,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ClientPhone entity.
     *
     */
    public function deleteAction(Request $request, ClientPhone $clientPhone)
    {
        $form = $this->createDeleteForm($clientPhone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($clientPhone);
            $em->flush();
        }

        return $this->redirectToRoute('clientphone_index');
    }

    /**
     * Creates a form to delete a ClientPhone entity.
     *
     * @param ClientPhone $clientPhone The ClientPhone entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ClientPhone $clientPhone)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clientphone_delete', array('id' => $clientPhone->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
