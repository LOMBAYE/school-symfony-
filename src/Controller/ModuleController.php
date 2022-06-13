<?php

namespace App\Controller;

use App\Repository\ModuleRepository;
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
}
