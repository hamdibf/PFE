<?php
namespace cnct\facpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('matricule')
            ->add('nom')
            ->add('prenom')
            ->add('adresse_ip')
            ->add('categorie', 'choice', array('choices' => array("Civil" => "Civil", "Militaire" => "Militaire"),'multiple' => false,
                'expanded' => false,
                'empty_value' => '- Choisissez une categorie -',
                'empty_data'  => -1
                ))
            ->add('etat','choice', array('choices' => array('A' => 'Actif', 'N/A' => 'Non actif', 'R' => 'Retraité'),'multiple' => false,
                'expanded' => false,
                'preferred_choices' => array(1),
                'empty_value' => '- Choisissez un état -',
                'empty_data'  => -1
                )
            )
            ->add('grade')
            ->add('processus', 'entity', array(
                'class' => 'cnctfacpBundle:Processus',
                        'required'  => 
                            false                        
                        ))
            ->add('direction', 'entity', array(
                'class' => 'cnctfacpBundle:Direction',
                        'required'  => 
                            false))
            ->add('sous_direction', 'entity', array(
                'class' => 'cnctfacpBundle:Sous_direction',
                        'required'  => 
                            false))
            ->add('authentificationObject', 'entity', array(
                'class' => 'cnctUserBundle:User',
                        'required'  => 
                            false))
        ;
    }

    public function getName()
    {
        return 'cnct_facpbundle_utilisateurtype';
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'cnct\facpBundle\Entity\Utilisateur',
        );
    }
}