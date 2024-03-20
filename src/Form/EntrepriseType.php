<?php

namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\Evenement;
use App\Entity\Tags;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('site')
            ->add('logo')
            ->add('description')
            ->add('adresse')
            ->add('telephone')
            ->add('affiliee')
            ->add('tagsEntreprise', EntityType::class, [
                'class' => Tags::class,
'choice_label' => 'id',
'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
