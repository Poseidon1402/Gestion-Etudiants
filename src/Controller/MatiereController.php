<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Repository\MatiereRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatiereController extends AbstractController
{
    #[Route('/matiere', name: 'app_matiere_liste', methods: ['GET'])]
    public function index(MatiereRepository $rep): Response
    {
        $subjects = $rep->findBy([], ['nom' => 'ASC']);

        return $this->render('matiere/index.html.twig', compact('subjects'));
    }
    
    #[Route('/matiere/ajouter', name: 'app_matiere_ajouter', methods: ['GET','POST'])]
    public function create(EntityManagerInterface $em, Request $req): Response
    {
        $subject = new Matiere;
        
        $form = $this->createForm(matiereType::class, $subject);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($subject);
            $em->flush();

            $this->addFlash('success', "L'étudiant a été ajouté avec succès !");

            return $this->redirectToRoute('app_matiere_liste');
        }
        
        return $this->render('matiere/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/matiere/modifier/{id}', name: 'app_matiere_modifier', methods: ['GET', 'PUT'])]
    public function modify(Matiere $subject, Request $req, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(matiereType::class, $subject, [
            'method' => 'PUT'
        ]);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){
            $em->flush();

            $this->addFlash('success', "La matière ".$subject->getLibelle()." a été modifié avec succès !");

            return $this->redirectToRoute('app_matiere_liste');
        }
        
        return $this->render('matiere/modify.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/matiere/supprimer/{id}', name: 'app_matiere_suppr', methods: ['DELETE'])]
    public function delete(Matiere $subject, Request $req, EntityManagerInterface $em): Response
    {
        if($this->isCsrfTokenValid('subject_deletion_'.$subject->getCodemat(), $req->request->get('csrf_token'))){
            $em->remove($subject);
            $em->flush();
            
            $this->addFlash('success', "La matière ".$subject->getLibelle().' a été supprimé avec succès !');

            return $this->redirectToRoute('app_matiere_liste');
        }
    }
}
