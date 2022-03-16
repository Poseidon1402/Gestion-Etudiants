<?php

namespace App\Form;

use App\Entity\Matiere;
use App\Entity\Niveau;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class MatiereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle', TextType::class, [
                'label' => 'Libellé',
                'constraints' => [
                    new NotBlank(null, message: "Ce champ ne pourrait pas être vide !")
                ]
            ])
            ->add('coefficient', TextType::class, [
                'label' => 'Coefficient',
                'constraints' => [
                    new NotBlank(null, message: "Ce champ ne pourrait pas être vide !")
                ]
            ])
            ->add('niveau', EntityType::class, [
                'class' => Niveau::class,
                'choice_label' => 'libelle',
                'label' => 'Niveau',
                'placeholder' => 'Le niveau pour laquelle cette matière sera liée',
                'constraints' => [
                    new NotBlank(null, message: "Ce champ ne pourrait pas être vide !")
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Matiere::class,
        ]);
    }
}
