<?php

namespace cnct\facpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use cnct\facpBundle\Entity\Direction;
use cnct\facpBundle\Form\DirectionType;

/**
 * Direction controller.
 *
 */
class DirectionController extends Controller
{
    /**
     * Lists all Direction entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('cnctfacpBundle:Direction')->findAll();

        return $this->render('cnctfacpBundle:Direction:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Direction entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('cnctfacpBundle:Direction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Direction entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('cnctfacpBundle:Direction:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Direction entity.
     *
     */
    public function newAction()
    {
        $entity = new Direction();
        $form   = $this->createForm(new DirectionType(), $entity);

        return $this->render('cnctfacpBundle:Direction:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Direction entity.
     *
     */
    public function createAction()
    {
        $entity  = new Direction();
        $request = $this->getRequest();
        $form    = $this->createForm(new DirectionType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('direction_show', array('id' => $entity->getId())));
            
        }

        return $this->render('cnctfacpBundle:Direction:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Direction entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('cnctfacpBundle:Direction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Direction entity.');
        }

        $editForm = $this->createForm(new DirectionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('cnctfacpBundle:Direction:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Direction entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('cnctfacpBundle:Direction')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Direction entity.');
        }

        $editForm   = $this->createForm(new DirectionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('direction_edit', array('id' => $id)));
        }

        return $this->render('cnctfacpBundle:Direction:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Direction entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('cnctfacpBundle:Direction')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Direction entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('direction'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
