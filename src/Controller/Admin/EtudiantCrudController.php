<?php

namespace App\Controller\Admin;

use App\Entity\Etudiant;
use App\Entity\Niveau;
use App\Repository\EtudiantRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class EtudiantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Etudiant::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom', 'Nom')
                ->setFormTypeOptions([
                    'required' => false,
                    'constraints' => [
                        new NotBlank(null, message: "Ce champ ne pourrait pas être vide"),
                    ]
                ])
                ->setColumns(6),
            TextField::new('prenoms', 'Prénoms')
                ->setFormTypeOptions([
                    'required' => false,
                    'constraints' => [
                        new NotBlank(null, message: "Ce champ ne pourrait pas être vide"),
                    ]
                ])
                ->setColumns(6),
            EmailField::new('email', 'Email')
                ->setFormTypeOptions([
                    'required' => false,
                    'constraints' => [
                        new NotBlank(null, message: "Ce champ ne pourrait pas être vide"),
                        new Email(null, message: "Email invalide")
                    ]
                ])
                ->setColumns(6),
            TextField::new('adresse')
                ->setFormTypeOptions([
                    'required' => false,
                    'constraints' => [
                        new NotBlank(null, message: "Ce champ ne pourrait pas être vide"),
                    ]
                ])
                ->setColumns(6),
            ChoiceField::new('sexe', 'Sexe')
                ->setFormTypeOptions([
                    'required' => false
                ])
                ->setChoices([
                    'Masculin' => 'Masculin',
                    'Feminin' => 'Feminin'
                ])
                ->renderExpanded()
                ->allowMultipleChoices(false),
            TextField::new('annee', 'Année Universitaire')
                ->setFormTypeOptions([
                    'attr' => [
                        'readOnly' => true
                    ],
                    'constraints' => [
                        new NotBlank(null, message: "Ce champ ne pourrait pas être vide"),
                    ]
                ])
                ->setColumns(6),
            AssociationField::new('niveau', 'Classe')
                ->setFormTypeOptions([
                    'class' => Niveau::class,
                    'choice_label' => 'nom',
                ])
                ->setColumns(6)
                ->renderAsNativeWidget()
        ];
    }
    
}
