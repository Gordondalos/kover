<?php

namespace ClientBundle\Controller;

use ClientPhoneBundle\Entity\ClientPhone;
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


    /*
     * Create a new client ajax
     *
     */

    public function  regNewClientAjaxAction(Request $request){

	    $newClient = json_decode($_GET['client']);

	    $phones  = $newClient->phones;
        $adreses = $newClient->adreses;
        $name = $newClient->name;
        $description = $newClient->description;

	    // Поищем клиента по имени
	    $em = $this->getDoctrine()->getManager();

	    $client = $em->getRepository('ClientBundle:Client')->findByName($name);

	    if(empty($client)){
		    $client = new Client();
		    $client->setName($name);
	    }else{
		    $client = $client[0];
	    }

	    if(!empty($client->getDescription())){
		    $newDes = $client->getDescription()." ".$description;
		    $client->setDescription($newDes);
	    }else{
		    $client->setDescription($description);
	    }

	    $em->persist($client);
	    $em->flush();

	    $client_id = $client->getId();

	    foreach ($phones as $phone){
		    $clientPhone = $em->getRepository('ClientPhoneBundle:ClientPhone')->findBy(array(
			    'phone' => $phone,
			    'client'=>$client
		    ));
		    if(!empty($clientPhone)){
		    	continue;
		    }
	    	$newPhone = new ClientPhone();
		    $newPhone->setClient($client);
		    $newPhone->setPhone($phone);
		    $em->persist($newPhone);
		    $em->flush();
	    }

	    foreach ($adreses as $adress){
		    $clientAdress = $em->getRepository('ClientAdressBundle:ClientAdress')->findBy(array(
			    'adress' => $adress,
			    'client'=>$client
		    ));
		    if(!empty($clientAdress)){
			    continue;
		    }
	    	$newAdress = new ClientAdress();
		    $newAdress->setClient($client);
		    $newAdress->setAdress($adress);
		    $em->persist($newAdress);
		    $em->flush();
	    }


	    $clientPhone_info = $em->getRepository('ClientPhoneBundle:ClientPhone')->findByClient($client);


	    $clientAdress_info = $em->getRepository('ClientAdressBundle:ClientAdress')->findByClient($client);

	    return $this->json($clientAdress_info);

	    $client_info['id'] = $client->getId();
	    $client_info['name'] = $client->getName();
	    $client_info['description'] = $client->getDescription();

	    $sentAdress = Array();
	    foreach ($clientAdress_info as $adres){
		    $sentAdress[]['adress']= $adres;
	    }

	    $sentPhone = Array();
	    foreach ($clientPhone_info as $phone){
		    $sentAdress[]['phone']= $phone;
	    }

	    $result = array_merge($client_info, $sentAdress, $sentPhone);

	    return $this->json(array('client' => $result));


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
