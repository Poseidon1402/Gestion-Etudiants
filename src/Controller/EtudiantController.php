<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'app_etudiant_liste', methods: ['GET'])]
    public function index(EtudiantRepository $rep): Response
    {
        $students = $rep->findBy([], ['nom' => 'ASC']);

        return $this->render('etudiant/index.html.twig', compact('students'));
    }
    
    #[Route('/etudiant/ajouter', name: 'app_etudiant_ajouter', methods: ['GET','POST'])]
    public function create(EntityManagerInterface $em, Request $req): Response
    {
        $student = new Etudiant;
        
        $form = $this->createForm(EtudiantType::class, $student);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($student);
            $em->flush();

            $this->addFlash('success', "L'étudiant a été ajouté avec succès !");

            return $this->redirectToRoute('app_etudiant_liste');
        }
        
        return $this->render('etudiant/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/etudiant/modifier/{id}', name: 'app_etudiant_modifier', methods: ['GET', 'PUT'])]
    public function modify(Etudiant $student, Request $req, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(EtudiantType::class, $student, [
            'method' => 'PUT'
        ]);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){
            $em->flush();

            $this->addFlash('success', "L'étudiant ".$student->getNom().' '.$student->getPrenoms()." a été modifié avec succès !");

            return $this->redirectToRoute('app_etudiant_liste');
        }
        
        return $this->render('etudiant/modify.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/etudiant/supprimer/{id}', name: 'app_etudiant_suppr', methods: ['DELETE'])]
    public function delete(Etudiant $student, Request $req, EntityManagerInterface $em): Response
    {
        if($this->isCsrfTokenValid('student_deletion_'.$student->getNumeroInscription(), $req->request->get('csrf_token'))){
            $em->remove($student);
            $em->flush();
            
            $this->addFlash('success', "L'étudiant ".$student->getNom().' '.$student->getPrenoms().' a été supprimé avec succès !');

            return $this->redirectToRoute('app_etudiant_liste');
        }
    }
}
