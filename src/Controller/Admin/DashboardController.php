<?php

namespace App\Controller\Admin;

use App\Controller\EtudiantController;
use App\Entity\Etudiant;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
                ->setController(EtudiantCrudController::class)
                ->generateUrl();

        return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gestion Des Etudiants')
        ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Etudiants');
    }
}
