<?php

namespace cnct\facpBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FacpGlobType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('origine', 'choice', array(
            'choices' => array('Audit Interne' => 'Audit Interne', 'Produit Non Conforme' => 'Produit Non Conforme',
            'Dysfonctionnement' => 'Dysfonctionnement', 'Revue De Direction' => 'Revue De Direction',
            'Reclamation Client' => 'Réclamation Client', 
            'Non Atteinte Objectifs' => 'Non Atteinte DObjectifs', 'Autre' => 'Autre' ),
            'empty_value' => '- Choisissez une origine -'))
            ->add('non_conformite', 'choice', array(
            'choices' => array('reelle' => 'Réelle', 'potentielle' => 'Potentielle',),
            'empty_value' => '- Choix de NC -'))
            ->add('enonce','textarea', array('label' => 'Enoncé', 'trim' => true, 'required' => true, 'max_length' =>10000))
            ->add('resp_concerne');
    }

    public function getName()
    {
        return 'cnct_facpbundle_facpglobtype';
    }
}
