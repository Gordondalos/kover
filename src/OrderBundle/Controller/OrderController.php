<?php

namespace OrderBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use OrderBundle\Entity\Order;
use OrderBundle\Form\OrderType;
use ClientPhoneBundle\Entity\ClientPhone;

/**
 * Order controller.
 *
 */
class OrderController extends Controller
{
    /**
     * Lists all Order entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $orders = $em->getRepository('OrderBundle:Order')->findAll();

        return $this->render('order/index.html.twig', array(
            'orders' => $orders,
        ));
    }

    /**
     * Creates a new Order entity.
     *
     */
    public function newAction(Request $request)
    {
        $order = new Order();
        $form = $this->createForm('OrderBundle\Form\OrderType', $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();

            return $this->redirectToRoute('order_show', array('id' => $order->getId()));
        }


	    $em = $this->getDoctrine()->getManager();

	    $phones_arr = $em->getRepository('ClientPhoneBundle:ClientPhone')->findAll();

	    $phones = array();
	    foreach ($phones_arr as $key=>$val){
//		    $phones[$key]['id'] = $val->getId();
		    $phones[$key]['phone'] = $val->getPhone();
		    $phones[$key]['client_id'] = $val->getClient()->getId();
//		    $phones[$key]['client_name'] = $val->getClient()->getName();
//		    $phones[$key]['client_description'] = $val->getClient()->getDescription();
	    }

	    echo '<pre>';
	    print_r($phones);
	    echo '</pre>';

        return $this->render('order/new.html.twig', array(
            'order' => $order,
	        'phones' => $phones,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Order entity.
     *
     */
    public function showAction(Order $order)
    {
        $deleteForm = $this->createDeleteForm($order);

        return $this->render('order/show.html.twig', array(
            'order' => $order,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Order entity.
     *
     */
    public function editAction(Request $request, Order $order)
    {
        $deleteForm = $this->createDeleteForm($order);
        $editForm = $this->createForm('OrderBundle\Form\OrderType', $order);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();

            return $this->redirectToRoute('order_edit', array('id' => $order->getId()));
        }

        return $this->render('order/edit.html.twig', array(
            'order' => $order,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Order entity.
     *
     */
    public function deleteAction(Request $request, Order $order)
    {
        $form = $this->createDeleteForm($order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($order);
            $em->flush();
        }

        return $this->redirectToRoute('order_index');
    }

    /**
     * Creates a form to delete a Order entity.
     *
     * @param Order $order The Order entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Order $order)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('order_delete', array('id' => $order->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
