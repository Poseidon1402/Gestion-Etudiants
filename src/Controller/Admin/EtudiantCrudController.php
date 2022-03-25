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

class EtudiantCrudController extends AbstractCrudController
{
    public function __construct(private EtudiantRepository $etRep)
    {
    }

    public static function getEntityFqcn(): string
    {
        return Etudiant::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new('prenoms'),
            EmailField::new('email'),
            TextField::new('adresse'),
            ChoiceField::new('sexe')->setChoices([
                'Masculin' => 'Masculin',
                'Feminin' => 'Feminin'
            ]),
            TextField::new('annee'),
            AssociationField::new('niveau')
                ->setFormTypeOptions([
                    'class' => Niveau::class,
                    'choice_label' => 'nom'
                ])
                ->renderAsNativeWidget()
        ];
    }
    
}
