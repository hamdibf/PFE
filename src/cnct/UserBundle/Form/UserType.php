<?php

namespace cnct\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            
            ->add('matricule')
            ->add('nom')
            ->add('prenom')
            ->add('adresse_ip')
            ->add('categorie')
            ->add('etat')
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
            ->add('username')
            ->add('email')
            ->add('enabled')
            ->add('password')


            
        ;
    }
    
    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => 'cnct\UserBundle\Entity\User',
        );
    }

    public function getName()
    {
        return 'cnct_userbundle_usertype';
    }
}
