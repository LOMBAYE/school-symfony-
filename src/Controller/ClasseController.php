<?php

namespace App\Controller;

use App\Repository\ClasseRepository;
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

       return $this->render('classe/index.html.twig', compact('classes'));
    }
}
