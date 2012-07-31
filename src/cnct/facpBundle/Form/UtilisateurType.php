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
            ->add('categorie', 'choice', array('choices' => array(1 => "Civil", 2 => "Militaire"),'multiple' => false,
                'expanded' => false,
                'empty_value' => '- Choisissez une categorie -',
                'empty_data'  => -1
                ))
            ->add('etat','choice', array('choices' => array(1 => "A", 2 => "N/A", 3 => "R"),'multiple' => false,
                'expanded' => false,
                'preferred_choices' => array(1),
                'empty_value' => '- Choisissez un état -',
                'empty_data'  => -1
                )
            )
            ->add('grade')
            ->add('processus')
            ->add('direction')
            ->add('sous_direction')
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