<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Entity\Module;
use App\Form\ClasseFormType;
use App\Repository\ClasseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClasseController extends AbstractController
{
    #[Route('/classe', name: 'app_classe')]
    public function index(ClasseRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $classes = $paginator->paginate($repo->findAll(),
        $request->query->getInt('page',1),
        10);
        $title = 'Liste des classes';
       return $this->render('classe/index.html.twig', compact('title','classes'));
    }

    #[Route('/classe/add', name: 'add_classe')]

    public function addProf(Request $request,EntityManagerInterface $manager): Response
    {
        $classe = new Classe();
        $form = $this->createForm(ClasseFormType::class, $classe);

     
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {   
            $classe->setRP($this->getUser());
            // $classe=$form->get('classe')->getData();
            // $classe->setClasse($classe);
            $manager->persist($classe);
          
            $manager->flush();
            
           return $this->redirectToRoute('app_classe');

        }
        // $form = $this->createForm(EtudiantFormType::class);

        return $this->render("classe/add.html.twig", [
            "form_title" => "Ajouter une classe",
            "form" => $form->createView(),
            // "classes"=>$classes
        ]);
    }
    
}
