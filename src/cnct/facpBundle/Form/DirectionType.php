<?php

namespace cnct\facpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DirectionType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('code_dir')
            ->add('libelle')
            ->add('directeur', 'entity', array(
                'class' => 'cnctfacpBundle:Utilisateur'));
        
    }

    public function getName()
    {
        return 'cnct_facpbundle_directiontype';
    }
}
