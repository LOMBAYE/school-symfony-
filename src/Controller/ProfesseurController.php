<?php

namespace App\Controller;

use App\Entity\Professeur;
use App\Form\ProfFormType;
use App\Form\ProfesseurType;
use App\Repository\ClasseRepository;
use App\Repository\ProfesseurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfesseurController extends AbstractController
{
    #[Route('/prof', name: 'app_professeur')]
    public function index(ProfesseurRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $professeurs = $paginator->paginate($repo->findAll(),
         $request->query->getInt('page',1),
         10);
         $title='Liste des professeurs';
        return $this->render('professeur/index.html.twig', compact('title','professeurs'));
    }
    #[Route('/prof/add', name: 'add_prof')]

    public function addProf(Request $request,EntityManagerInterface $manager): Response
    {
        $prof = new Professeur();
        $form = $this->createForm(ProfFormType::class, $prof);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {   
            $prof->setRP($this->getUser());
            // $classe=$form->get('classe')->getData();
            // $prof->setClasse($classe);
            $manager->persist($prof);
            $manager->flush();  
           return $this->redirectToRoute('app_professeur');
        }

        return $this->render("professeur/add.html.twig", [
            "form_title" => "Ajouter un prof",
            "form" => $form->createView(),
            // "classes"=>$classes
        ]);
    }
    
}
