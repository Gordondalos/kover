<?php

namespace ClientBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ClientBundle\Entity\Client;
use ClientBundle\Form\ClientType;

use ClientAdressBundle\Entity\ClientAdress;

/**
 * Client controller.
 *
 */
class ClientController extends Controller
{
    /**
     * Lists all Client entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clients = $em->getRepository('ClientBundle:Client')->findAll();


        return $this->render('client/index.html.twig', array(
            'clients' => $clients,
        ));
    }

    /**
     * Creates a new Client entity.
     *
     */
    public function newAction(Request $request)
    {
        $client = new Client();
        $form = $this->createForm('ClientBundle\Form\ClientType', $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('client_show', array('id' => $client->getId()));
        }

        return $this->render('client/new.html.twig', array(
            'client' => $client,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Client entity.
     *
     */
    public function showAction(Client $client)
    {
        $deleteForm = $this->createDeleteForm($client);
	    $em = $this->getDoctrine()->getManager();

	    $clientAdress = $em->getRepository('ClientAdressBundle:ClientAdress')->findBy(array(
	    	'client' => $client,
	    ));
	    $clientPhone = $em->getRepository('ClientPhoneBundle:ClientPhone')->findBy(array(
		    'client' => $client,
	    ));


        return $this->render('client/show.html.twig', array(
            'client' => $client,
            'clientAdress' => $clientAdress,
            'clientPhone' => $clientPhone,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Client entity.
     *
     */
    public function editAction(Request $request, Client $client)
    {
        $deleteForm = $this->createDeleteForm($client);
        $editForm = $this->createForm('ClientBundle\Form\ClientType', $client);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('client_edit', array('id' => $client->getId()));
        }

        return $this->render('client/edit.html.twig', array(
            'client' => $client,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

	public function getAction(Client $client){
		$em = $this->getDoctrine()->getManager();

		$clientAdress = $em->getRepository('ClientAdressBundle:ClientAdress')->findBy(array(
			'client' => $client,
		));
		$clientPhone = $em->getRepository('ClientPhoneBundle:ClientPhone')->findBy(array(
			'client' => $client,
		));

		$clientAdress_info = Array();
		foreach ($clientAdress as $key => $adresok){
			$clientAdress_info['adreses'][$key]=$adresok->getAdress();
		}

		$clientPhone_info = array();
		foreach ($clientPhone as $key => $phones){
			$clientPhone_info['phones'][$key]=$phones->getPhone();
		}



		$client_info['id'] = $client->getId();
		$client_info['name'] = $client->getName();
		$client_info['description'] = $client->getDescription();

		$result = array_merge($client_info,$clientAdress_info, $clientPhone_info);

		return $this->json(array('client' => $result));

	}

    /**
     * Deletes a Client entity.
     *
     */
    public function deleteAction(Request $request, Client $client)
    {
        $form = $this->createDeleteForm($client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($client);
            $em->flush();
        }

        return $this->redirectToRoute('client_index');
    }

    /**
     * Creates a form to delete a Client entity.
     *
     * @param Client $client The Client entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Client $client)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('client_delete', array('id' => $client->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
