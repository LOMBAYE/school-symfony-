<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Module;
use App\Entity\Professeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProfFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomComplet')
            ->add('grade')
            ->add('ajouter_module',EntityType::class,[
                'class' => Module::class,
                'choice_label' => 'libelle',
                'multiple'=>true,
                'mapped' => false
            ])
            // ->add('classes')
            // ->add('affecter_classe',EntityType::class,[
            //     'class' => Classe::class,
            //     'choice_label' => 'libelle',
            //     'mapped' => false
            // ])
            ->add('Ajouter', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Professeur::class,
        ]);
    }
}
