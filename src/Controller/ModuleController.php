<?php

namespace App\Controller;

use App\Entity\Module;
use App\Form\ModuleFormType;
use App\Repository\ModuleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ModuleController extends AbstractController
{
    #[Route('/module', name: 'app_module')]
    public function index(ModuleRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $modules = $paginator->paginate($repo->findAll(),
        $request->query->getInt('page',1),
        10);

       return $this->render('module/index.html.twig', compact('modules'));
        // return $this->render('module/index.html.twig', [
        //     'controller_name' => 'ModuleController',
        // ]);
    }


    #[Route('/module/add', name: 'add_module')]
    public function ajouterModule(Request $request,EntityManagerInterface $manager):Response
    {
       $module= new Module();

        $form = $this->createForm(ModuleFormType::class,$module);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {   
            $manager->persist($module);
            $manager->flush();    
            $this->redirectToRoute('app_module');
    }
    return $this->render("module/add.html.twig", [
        "form_title" => "Ajouter une module",
        "form" => $form->createView(),
    ]);
}
}