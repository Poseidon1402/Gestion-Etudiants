<?php

namespace App\Controller\Admin;

use App\Entity\Etudiant;
use App\Entity\Matiere;
use App\Entity\Niveau;
use App\Entity\Note;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NoteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Note::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('etudiant', 'Etudiant')
                ->setFormTypeOptions([
                    'class' => Etudiant::class,
                    'choice_label' => 'prenoms',
                ]),
            AssociationField::new('matiere', 'Matiere')
                ->setFormTypeOptions([
                    'class' => Matiere::class,
                    'choice_label' => 'libelle',
                ]),
            AssociationField::new('niveau', 'Niveau')
                ->setFormTypeOptions([
                    'class' => Niveau::class,
                    'choice_label' => 'nom',
                ]),
            NumberField::new('note', 'Note')
                ->setFormTypeOption('html5', true)
        ];
    }
    
}
