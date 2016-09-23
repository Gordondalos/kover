<?php

namespace ProductPropertiesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ProductPropertiesBundle\Entity\ProductProperties;
use ProductPropertiesBundle\Form\ProductPropertiesType;

/**
 * ProductProperties controller.
 *
 */
class ProductPropertiesController extends Controller
{
    /**
     * Lists all ProductProperties entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productProperties = $em->getRepository('ProductPropertiesBundle:ProductProperties')->findAll();

        return $this->render('productproperties/index.html.twig', array(
            'productProperties' => $productProperties,
        ));
    }

    /**
     * Creates a new ProductProperties entity.
     *
     */
    public function newAction(Request $request)
    {
        $productProperty = new ProductProperties();
        $form = $this->createForm('ProductPropertiesBundle\Form\ProductPropertiesType', $productProperty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productProperty);
            $em->flush();

            return $this->redirectToRoute('productproperties_show', array('id' => $productProperty->getId()));
        }

        return $this->render('productproperties/new.html.twig', array(
            'productProperty' => $productProperty,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProductProperties entity.
     *
     */
    public function showAction(ProductProperties $productProperty)
    {
        $deleteForm = $this->createDeleteForm($productProperty);

        return $this->render('productproperties/show.html.twig', array(
            'productProperty' => $productProperty,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProductProperties entity.
     *
     */
    public function editAction(Request $request, ProductProperties $productProperty)
    {
        $deleteForm = $this->createDeleteForm($productProperty);
        $editForm = $this->createForm('ProductPropertiesBundle\Form\ProductPropertiesType', $productProperty);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productProperty);
            $em->flush();

            return $this->redirectToRoute('productproperties_edit', array('id' => $productProperty->getId()));
        }

        return $this->render('productproperties/edit.html.twig', array(
            'productProperty' => $productProperty,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProductProperties entity.
     *
     */
    public function deleteAction(Request $request, ProductProperties $productProperty)
    {
        $form = $this->createDeleteForm($productProperty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($productProperty);
            $em->flush();
        }

        return $this->redirectToRoute('productproperties_index');
    }

    /**
     * Creates a form to delete a ProductProperties entity.
     *
     * @param ProductProperties $productProperty The ProductProperties entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProductProperties $productProperty)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productproperties_delete', array('id' => $productProperty->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
