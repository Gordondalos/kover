<?php

namespace ProductPropertiesValueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ProductPropertiesValueBundle\Entity\ProductPropertiesValue;
use ProductPropertiesValueBundle\Form\ProductPropertiesValueType;

/**
 * ProductPropertiesValue controller.
 *
 */
class ProductPropertiesValueController extends Controller
{
    /**
     * Lists all ProductPropertiesValue entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productPropertiesValues = $em->getRepository('ProductPropertiesValueBundle:ProductPropertiesValue')->findAll();

        return $this->render('productpropertiesvalue/index.html.twig', array(
            'productPropertiesValues' => $productPropertiesValues,
        ));
    }

    /**
     * Creates a new ProductPropertiesValue entity.
     *
     */
    public function newAction(Request $request)
    {
        $productPropertiesValue = new ProductPropertiesValue();
        $form = $this->createForm('ProductPropertiesValueBundle\Form\ProductPropertiesValueType', $productPropertiesValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productPropertiesValue);
            $em->flush();

            return $this->redirectToRoute('productpropertiesvalue_show', array('id' => $productPropertiesValue->getId()));
        }

        return $this->render('productpropertiesvalue/new.html.twig', array(
            'productPropertiesValue' => $productPropertiesValue,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProductPropertiesValue entity.
     *
     */
    public function showAction(ProductPropertiesValue $productPropertiesValue)
    {
        $deleteForm = $this->createDeleteForm($productPropertiesValue);

        return $this->render('productpropertiesvalue/show.html.twig', array(
            'productPropertiesValue' => $productPropertiesValue,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProductPropertiesValue entity.
     *
     */
    public function editAction(Request $request, ProductPropertiesValue $productPropertiesValue)
    {
        $deleteForm = $this->createDeleteForm($productPropertiesValue);
        $editForm = $this->createForm('ProductPropertiesValueBundle\Form\ProductPropertiesValueType', $productPropertiesValue);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productPropertiesValue);
            $em->flush();

            return $this->redirectToRoute('productpropertiesvalue_edit', array('id' => $productPropertiesValue->getId()));
        }

        return $this->render('productpropertiesvalue/edit.html.twig', array(
            'productPropertiesValue' => $productPropertiesValue,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProductPropertiesValue entity.
     *
     */
    public function deleteAction(Request $request, ProductPropertiesValue $productPropertiesValue)
    {
        $form = $this->createDeleteForm($productPropertiesValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($productPropertiesValue);
            $em->flush();
        }

        return $this->redirectToRoute('productpropertiesvalue_index');
    }

    /**
     * Creates a form to delete a ProductPropertiesValue entity.
     *
     * @param ProductPropertiesValue $productPropertiesValue The ProductPropertiesValue entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProductPropertiesValue $productPropertiesValue)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productpropertiesvalue_delete', array('id' => $productPropertiesValue->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
