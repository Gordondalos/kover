<?php

namespace ClientAdressBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClientAdressBundle\Entity\ClientAdress;
use ClientAdressBundle\Form\ClientAdressType;

/**
 * ClientAdress controller.
 *
 */
class ClientAdressController extends Controller
{
    /**
     * Lists all ClientAdress entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clientAdresses = $em->getRepository('ClientAdressBundle:ClientAdress')->findAll();

        return $this->render('clientadress/index.html.twig', array(
            'clientAdresses' => $clientAdresses,
        ));
    }

    /**
     * Creates a new ClientAdress entity.
     *
     */
    public function newAction(Request $request)
    {
        $clientAdress = new ClientAdress();
        $form = $this->createForm('ClientAdressBundle\Form\ClientAdressType', $clientAdress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clientAdress);
            $em->flush();

            return $this->redirectToRoute('clientadress_show', array('id' => $clientAdress->getId()));
        }

        return $this->render('clientadress/new.html.twig', array(
            'clientAdress' => $clientAdress,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ClientAdress entity.
     *
     */
    public function showAction(ClientAdress $clientAdress)
    {
        $deleteForm = $this->createDeleteForm($clientAdress);

        return $this->render('clientadress/show.html.twig', array(
            'clientAdress' => $clientAdress,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ClientAdress entity.
     *
     */
    public function editAction(Request $request, ClientAdress $clientAdress)
    {
        $deleteForm = $this->createDeleteForm($clientAdress);
        $editForm = $this->createForm('ClientAdressBundle\Form\ClientAdressType', $clientAdress);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($clientAdress);
            $em->flush();

            return $this->redirectToRoute('clientadress_edit', array('id' => $clientAdress->getId()));
        }

        return $this->render('clientadress/edit.html.twig', array(
            'clientAdress' => $clientAdress,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ClientAdress entity.
     *
     */
    public function deleteAction(Request $request, ClientAdress $clientAdress)
    {
        $form = $this->createDeleteForm($clientAdress);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($clientAdress);
            $em->flush();
        }

        return $this->redirectToRoute('clientadress_index');
    }

    /**
     * Creates a form to delete a ClientAdress entity.
     *
     * @param ClientAdress $clientAdress The ClientAdress entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ClientAdress $clientAdress)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clientadress_delete', array('id' => $clientAdress->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
