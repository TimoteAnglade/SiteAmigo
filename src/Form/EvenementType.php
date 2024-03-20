<?php

namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\Evenement;
use App\Entity\LieuEvenement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('date', null, [
                'widget' => 'single_text'
            ])
            ->add('affiche')
            ->add('tarifLibre')
            ->add('tarifMembre')
            ->add('datePublication', null, [
                'widget' => 'single_text'
            ])
            ->add('description')
            ->add('lienInscription')
            ->add('dateLimiteInscription', null, [
                'widget' => 'single_text'
            ])
            ->add('placesRestantes')
            ->add('afficheFerme')
            ->add('aLieuA', EntityType::class, [
                'class' => LieuEvenement::class,
'choice_label' => 'id',
            ])
            ->add('entreprisesParticipantes', EntityType::class, [
                'class' => Entreprise::class,
'choice_label' => 'id',
'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
