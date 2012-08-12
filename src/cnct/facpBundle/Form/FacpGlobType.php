<?php

namespace cnct\facpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FacpGlobType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('num')
            ->add('origine')
            ->add('type')
            ->add('enonce','textarea')
            ->add('resp_concerne')
            ->add('pilote')
            ->add('interime')
        ;
    }

    public function getName()
    {
        return 'cnct_facpbundle_facpglobtype';
    }
}
