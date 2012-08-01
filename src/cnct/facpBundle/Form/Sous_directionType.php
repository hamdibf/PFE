<?php

namespace cnct\facpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class Sous_directionType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('code_s_dir')
            ->add('libelle')
            ->add('direction')
        ;
    }

    public function getName()
    {
        return 'cnct_facpbundle_sous_directiontype';
    }
}
