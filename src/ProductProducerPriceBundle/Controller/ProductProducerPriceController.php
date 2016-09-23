<?php

namespace ProductProducerPriceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ProductProducerPriceBundle\Entity\ProductProducerPrice;
use ProductProducerPriceBundle\Form\ProductProducerPriceType;

/**
 * ProductProducerPrice controller.
 *
 */
class ProductProducerPriceController extends Controller
{
    /**
     * Lists all ProductProducerPrice entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productProducerPrices = $em->getRepository('ProductProducerPriceBundle:ProductProducerPrice')->findAll();

        return $this->render('productproducerprice/index.html.twig', array(
            'productProducerPrices' => $productProducerPrices,
        ));
    }

    /**
     * Creates a new ProductProducerPrice entity.
     *
     */
    public function newAction(Request $request)
    {
        $productProducerPrice = new ProductProducerPrice();
        $form = $this->createForm('ProductProducerPriceBundle\Form\ProductProducerPriceType', $productProducerPrice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productProducerPrice);
            $em->flush();

            return $this->redirectToRoute('productproducerprice_show', array('id' => $productProducerPrice->getId()));
        }

        return $this->render('productproducerprice/new.html.twig', array(
            'productProducerPrice' => $productProducerPrice,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProductProducerPrice entity.
     *
     */
    public function showAction(ProductProducerPrice $productProducerPrice)
    {
        $deleteForm = $this->createDeleteForm($productProducerPrice);

        return $this->render('productproducerprice/show.html.twig', array(
            'productProducerPrice' => $productProducerPrice,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProductProducerPrice entity.
     *
     */
    public function editAction(Request $request, ProductProducerPrice $productProducerPrice)
    {
        $deleteForm = $this->createDeleteForm($productProducerPrice);
        $editForm = $this->createForm('ProductProducerPriceBundle\Form\ProductProducerPriceType', $productProducerPrice);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productProducerPrice);
            $em->flush();

            return $this->redirectToRoute('productproducerprice_edit', array('id' => $productProducerPrice->getId()));
        }

        return $this->render('productproducerprice/edit.html.twig', array(
            'productProducerPrice' => $productProducerPrice,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProductProducerPrice entity.
     *
     */
    public function deleteAction(Request $request, ProductProducerPrice $productProducerPrice)
    {
        $form = $this->createDeleteForm($productProducerPrice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($productProducerPrice);
            $em->flush();
        }

        return $this->redirectToRoute('productproducerprice_index');
    }

    /**
     * Creates a form to delete a ProductProducerPrice entity.
     *
     * @param ProductProducerPrice $productProducerPrice The ProductProducerPrice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProductProducerPrice $productProducerPrice)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productproducerprice_delete', array('id' => $productProducerPrice->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
