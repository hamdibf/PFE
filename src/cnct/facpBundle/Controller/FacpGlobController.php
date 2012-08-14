<?php

namespace cnct\facpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use cnct\facpBundle\Entity\FacpGlob;
use cnct\facpBundle\Form\FacpGlobType;

/**
 * FacpGlob controller.
 *
 */
class FacpGlobController extends Controller
{
    /**
     * Lists all FacpGlob entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('cnctfacpBundle:FacpGlob')->findAll();

        return $this->render('cnctfacpBundle:FacpGlob:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a FacpGlob entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('cnctfacpBundle:FacpGlob')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FacpGlob entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('cnctfacpBundle:FacpGlob:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new FacpGlob entity.
     *
     */
    public function newAction()
    {
        $entity = new FacpGlob();
        $form   = $this->createForm(new FacpGlobType(), $entity);

        return $this->render('cnctfacpBundle:FacpGlob:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new FacpGlob entity.
     *
     */
    public function createAction()
    {
        $entity  = new FacpGlob();
        $request = $this->getRequest();
        
        $ip = $this->container->get('request')->getClientIp();
        
        $repository = $this->getDoctrine()
                   ->getEntityManager()
                   ->getRepository('cnctfacpBundle:Utilisateur');
        
        $detecteur = $repository->findOneBy(array('adresse_ip' => $ip));
        $entity->setDetecteur($detecteur);
        
        $form    = $this->createForm(new FacpGlobType(), $entity);        
        $form->bindRequest($request);              
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();            
            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->setFlash('info', 'Enregitrement terminé avec succés');
            return $this->redirect($this->generateUrl('facpglob_show', array('id' => $entity->getId())));
            
        }

        return $this->render('cnctfacpBundle:FacpGlob:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing FacpGlob entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('cnctfacpBundle:FacpGlob')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FacpGlob entity.');
        }

        $editForm = $this->createForm(new FacpGlobType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('cnctfacpBundle:FacpGlob:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing FacpGlob entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('cnctfacpBundle:FacpGlob')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FacpGlob entity.');
        }

        $editForm   = $this->createForm(new FacpGlobType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('facpglob_edit', array('id' => $id)));
        }

        return $this->render('cnctfacpBundle:FacpGlob:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a FacpGlob entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('cnctfacpBundle:FacpGlob')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find FacpGlob entity.');
            }

            $em->remove($entity);
            $em->flush();
        }
        $this->get('session')->setFlash('info', 'Facp supprimée avec succés');
        return $this->redirect($this->generateUrl('facpglob'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
