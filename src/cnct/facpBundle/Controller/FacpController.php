<?php

namespace cnct\FacpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use cnct\facpBundle\Entity\Utilisateur;
use cnct\facpBundle\Form\UtilisateurType;
use cnct\facpBundle\Form\UtilisateurHandler;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use JMS\SecurityExtraBundle\Annotation\Secure;

class FacpController extends Controller
{
    /**
     * @Secure(roles="IS_AUTHENTICATED_REMEMBERED")
     */ 
    public function indexAction($page)
    {  
        $repository = $this->getDoctrine()
                           ->getEntityManager()
                           ->getRepository('cnctfacpBundle:Utilisateur');
        
        $nbr_utilisateurs = $repository->getTotal();
        $nb_utilisateur_page = 5;
        // On calcule le nombre total de pages
        $nb_pages = ceil($nbr_utilisateurs/$nb_utilisateur_page);
        // On va récupérer les articles à partir du N-ième article :
        $offset = ($page-1) * $nb_utilisateur_page;
        // lorsque la page est inférieur à 1 ou supérieur au nombre max.
        if( $page < 1 OR $page > $nb_pages )
        {
            throw $this->createNotFoundException('Page inexistante (page = '.$page.')');
        }
        // On récupère les articles qu'il faut grâce à findBy() :
        $utilisateurs = $repository->findBy(
            array(),                 // Pas de critère
            array('id' => 'desc'), // On tri par date décroissante
            $nb_utilisateur_page,       // On sélectionne $nb_articles_page articles
            $offset                  // A partir du $offset ième
        );
        // L'appel de la vue ne change pas
        return $this->render('cnctfacpBundle:Facp:index.html.twig', array(
            'utilisateurs' => $utilisateurs,
            'page'     => $page,    // On transmet à la vue la page courante,
            'nb_pages' => $nb_pages, // Et le nombre total de pages.
            ));
    }


    public function voirAction(Utilisateur $utilisateur)
    {
       return $this->render('cnctfacpBundle:Facp:voir.html.twig', array(
            'utilisateur' => $utilisateur
        ));
    }
    /**
     * @Secure(roles="ROLE_AUTEUR")
     */
    public function ajouterAction()
    {
        // On crée un objet Article.
        $utilisateur = new Utilisateur();

        $form = $this->createForm(new UtilisateurType, $utilisateur);

        // On crée le gestionnaire pour ce formulaire, avec les outils dont il a besoin
        $formHandler = new UtilisateurHandler($form, $this->get('request'), $this->getDoctrine()->getEntityManager());

        // On exécute le traitement du formulaire. S'il retourne true, alors le formulaire a bien été traité
        if( $formHandler->process() )
        {
            return $this->redirect( $this->generateUrl('cnctfacpBundle_voir', array('id' => $utilisateur->getId())) );
        }

        // Et s'il retourne false alors la requête n'était pas en POST ou le formulaire non valide.
        // On réaffiche donc le formulaire.
        return $this->render('cnctfacpBundle:Facp:ajouter.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function modifierAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        if( ! $utilisateur = $em->getRepository('cnct\facpBundle\Entity\Utilisateur')->find($id) )
        {
            throw $this->createNotFoundException('Utilisateur[id='.$id.'] inexistant');
        }
        
         // On passe l'$utilisateur récupéré au formulaire
        $form        = $this->createForm(new UtilisateurType, $utilisateur);
        $formHandler = new UtilisateurHandler($form, $this->get('request'), $em);

        if($formHandler->process())
        {
            return $this->redirect( $this->generateUrl('cnctfacpBundle_voir', array('id' => $utilisateur->getId())) );
        }

        return $this->render('cnctfacpBundle:Facp:modifier.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function supprimerAction($id)
    {
        $utilisateur = $this->getDoctrine()
                        ->getEntityManager()
                        ->getRepository('cnctfacpBundle:Utilisateur')
                        ->find($id);

        // Si l'utilisateur n'existe pas, on affiche une erreur 404
        if( $utilisateur == null )
        {
            throw $this->createNotFoundException('Utilisateur[id='.$id.'] inexistant');
        }

        
            $em = $this->getDoctrine()->getEntityManager();
            $em->remove($utilisateur);
            $em->flush();
            
            $this->get('session')->setFlash('info', 'Utilisateur bien supprimé');

            // Puis on redirige vers l'accueil.
            return $this->redirect( $this->generateUrl('cnctfacpBundle_homepage') );
        

        // Si la requête est en GET, on affiche une page de confirmation avant de supprimer.
        
    }
    
    public function confirmAction($id){
        
        $utilisateur = $this->getDoctrine()
                        ->getEntityManager()
                        ->getRepository('cnctfacpBundle:Utilisateur')
                        ->find($id);
        
        return $this->render('cnctfacpBundle:Facp:supprimer.html.twig', array(
            'utilisateur' => $utilisateur
        ));
    }
    
    public function choisirAction(){
        
        return $this->render('cnctfacpBundle:Facp:choisir.html.twig');
    }
}