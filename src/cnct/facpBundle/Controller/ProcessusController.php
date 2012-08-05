<?php

namespace cnct\facpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use cnct\facpBundle\Entity\Utilisateur;
use cnct\facpBundle\Entity\Processus;
use cnct\facpBundle\Form\ProcessusType;

/**
 * Processus controller.
 *
 */
class ProcessusController extends Controller
{
    /**
     * Lists all Processus entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('cnctfacpBundle:Processus')->findAll();

        return $this->render('cnctfacpBundle:Processus:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Processus entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('cnctfacpBundle:Processus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Processus entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('cnctfacpBundle:Processus:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Processus entity.
     *
     */
    public function newAction()
    {
        $entity = new Processus();
        $form   = $this->createForm(new ProcessusType(), $entity);

        return $this->render('cnctfacpBundle:Processus:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Processus entity.
     *
     */
    public function createAction()
    {
        $entity  = new Processus();
                
        $request = $this->get('request');
        $form    = $this->createForm(new ProcessusType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            
            $repository = $this->getDoctrine()
                   ->getEntityManager()
                   ->getRepository('cnctfacpBundle:Utilisateur');

//            $pilote = $repository->findOneByMatricule($entity->getPilote());
//            var_dump($pilote);
//            $interime = $repository->findOneByMatricule($entity->getInterime());
//            $entity->setPilote($pilote);
//            $entity->setInterime($interime);
//            
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();
//
            return $this->redirect($this->generateUrl('processus_show', array('id' => $entity->getId())));
//            
        }
//
        return $this->render('cnctfacpBundle:Processus:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Processus entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('cnctfacpBundle:Processus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Processus entity.');
        }

        $editForm = $this->createForm(new ProcessusType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('cnctfacpBundle:Processus:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Processus entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('cnctfacpBundle:Processus')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Processus entity.');
        }

        $editForm   = $this->createForm(new ProcessusType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('processus_edit', array('id' => $id)));
        }

        return $this->render('cnctfacpBundle:Processus:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Processus entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('cnctfacpBundle:Processus')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Processus entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('processus'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
