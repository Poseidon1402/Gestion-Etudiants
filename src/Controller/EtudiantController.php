<?php

namespace App\Controller;

use App\Repository\EtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'app_etudiant_list', methods: ['GET'])]
    public function index(EtudiantRepository $rep): Response
    {
        $students = $rep->findBy([], ['nom' => 'ASC']);

        return $this->render('etudiant/index.html.twig', compact('students'));
    }
    
    #[Route('/etudiant/add', name: 'app_etudiant_add')]
    public function create(EtudiantRepository $rep): Response
    {
        return $this->render('etudiant/index.html.twig', compact('students'));
    }
}
