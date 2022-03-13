<?php

namespace App\Form;

use App\Entity\Etudiant;
use App\Entity\Niveau;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'placeholder' => "Nom de l'étudiant",
                'constraints' => [
                    new NotBlank([], message: "Ce champ ne pourrait pas être vide")
                ]
            ])
            ->add('prenoms', TextType::class, [
                'label' => 'Prénoms',
                'placeholder' => "Prénoms de l'étudiant",
                'constraints' => [
                    new NotBlank([], message: "Ce champ ne pourrait pas être vide")
                ]
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse',
                'placeholder' => "Domicile",
                'constraints' => [
                    new NotBlank([], message: "Ce champ ne pourrait pas être vide")
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => [
                    new NotBlank([], message: "Ce champ ne pourrait pas être vide")
                ]
            ])
            ->add('sexe', TextType::class, [
                'label' => 'Sexe',
                'constraints' => [
                    new NotBlank([], message: "Ce champ ne pourrait pas être vide")
                ]
            ])
            ->add('annee', TextType::class, [
                'label' => 'Année',
                'constraints' => [
                    new NotBlank([], message: "Ce champ ne pourrait pas être vide")
                ]
            ])
            ->add('niveau', EntityType::class, [
                'class' => Niveau::class,
                'choice_label' => 'nom',
                'placeholder' => 'choisissez un niveau',
                'attr' => [
                    'readOnly' => true
                ],
                'constraints' => [
                    new NotBlank([], message: "Ce champ ne pourrait pas être vide")
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
