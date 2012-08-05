<?php

namespace cnct\facpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use cnct\facpBundle\Entity\Utilisateur;

class ProcessusType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('code_pro')
            ->add('libelle')
            ->add('pilote', 'entity', array(
    'class' => 'cnctfacpBundle:Utilisateur',
));        
    }
  
    public function getName()
    {
        return 'cnct_facpbundle_processustype';
    }
}
