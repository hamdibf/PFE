<?php

namespace cnct\facpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use cnct\facpBundle\Entity\Sous_direction;
use cnct\facpBundle\Form\Sous_directionType;

/**
 * Sous_direction controller.
 *
 */
class Sous_directionController extends Controller
{
    /**
     * Lists all Sous_direction entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('cnctfacpBundle:Sous_direction')->findAll();

        return $this->render('cnctfacpBundle:Sous_direction:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Sous_direction entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('cnctfacpBundle:Sous_direction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sous_direction entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('cnctfacpBundle:Sous_direction:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Sous_direction entity.
     *
     */
    public function newAction()
    {
        $entity = new Sous_direction();
        $form   = $this->createForm(new Sous_directionType(), $entity);

        return $this->render('cnctfacpBundle:Sous_direction:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Sous_direction entity.
     *
     */
    public function createAction()
    {
        $entity  = new Sous_direction();
        $request = $this->getRequest();
        $form    = $this->createForm(new Sous_directionType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sous_direction_show', array('id' => $entity->getId())));
            
        }

        return $this->render('cnctfacpBundle:Sous_direction:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Sous_direction entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('cnctfacpBundle:Sous_direction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sous_direction entity.');
        }

        $editForm = $this->createForm(new Sous_directionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('cnctfacpBundle:Sous_direction:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Sous_direction entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('cnctfacpBundle:Sous_direction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sous_direction entity.');
        }

        $editForm   = $this->createForm(new Sous_directionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sous_direction_edit', array('id' => $id)));
        }

        return $this->render('cnctfacpBundle:Sous_direction:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Sous_direction entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('cnctfacpBundle:Sous_direction')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sous_direction entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('sous_direction'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
