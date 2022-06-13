<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Form\EtudiantFormType;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'app_etudiant')]
    public function index(EtudiantRepository $repo, PaginatorInterface $paginator, Request $request): Response
    { 
        $etudiants = $paginator->paginate($repo->findAll(),
         $request->query->getInt('page',1),
         10);

        // return $this->render('etudiant/index.html.twig', compact('etudiants'));
        return $this->render('etudiant/index.html.twig', [
                    'controller_name' => 'Insertion',
                    'title' => 'Liste des etudiants',
                    'etudiants'=>$etudiants,
                ]);
    }
    // #[Route('/etudiant', name: 'app_etudiants')]
    // public function inserer(): Response
    // {
    //     return $this->render('etudiant/index.html.twig', [
    //         'controller_name' => 'Insertion',
    //     ]);
    // }

  
    #[Route('/add/etudiant', name: 'add_etudiant')]

    public function addEtudiant(Request $request,EntityManagerInterface $manager): Response
    {
        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantFormType::class, $etudiant);
        $form->remove('matricule');
        $matricule="MAT-".date("dmYhis");
        $etudiant->setMatricule($matricule);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            // $entityManager = $this->getDoctrine()->getManager();
            $manager->persist($etudiant);
            $manager->flush();
            
            $this->redirectToRoute('app_etudiant');

        }
        // $form = $this->createForm(EtudiantFormType::class);

        return $this->render("etudiant/add.html.twig", [
            "form_title" => "Ajouter un etudiant",
            "form_etudiant" => $form->createView(),
        ]);
    }
}
