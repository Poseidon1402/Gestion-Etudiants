<?php

namespace App\Controller\Admin;

use App\Entity\Matiere;
use App\Entity\Niveau;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Range;

class MatiereCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Matiere::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('libelle', 'Libellé')
                ->setFormTypeOption('required', false)
                ->setFormTypeOption('constraints', [
                    new NotNull(null, message: 'Ce champ ne peut pas être vide !'),
                    new Length(null, min: 3, minMessage: 'Il doit y avoir au moins {{ limit }} caractères', 
                        max: 50, maxMessage: 'Le nombre des caractères ne devra pas dépasser {{ limit }} caractères')
                ]),
            NumberField::new('coefficient', 'Coefficient')
                ->setFormTypeOption('html5', true)
                ->setFormTypeOption('required', false)
                ->setFormTypeOption('constraints', [
                    new Range(null, notInRangeMessage: 'valeur invalide', min: 1, max: 6)
                ]),
            AssociationField::new('niveau', 'Niveau')
                ->setFormTypeOptions([
                    'class' => Niveau::class,
                    'choice_label' => 'nom',
                ])
                ->setColumns(6)
                ->renderAsNativeWidget()
        ];
    }
    
}
