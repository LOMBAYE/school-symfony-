<?php

namespace App\Controller;

use App\Repository\DemandeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DemandeController extends AbstractController
{
    #[Route('/demande', name: 'app_demande')]
    public function index(DemandeRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {   
        $demandes = $paginator->paginate($repo->findAll(),
        $request->query->getInt('page',1),
        10);

       return $this->render('demande/index.html.twig', compact('demandes'));
        // return $this->render('demande/index.html.twig', [
        //     'controller_name' => 'DemandeController',
        // ]);
    }
}
