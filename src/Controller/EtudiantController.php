<?php

namespace App\Controller;

use App\Repository\EtudiantRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'app_etudiant')]
    public function index(EtudiantRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $etudiants = $paginator->paginate($repo->findAll(),
         $request->query->getInt('page',1),
         10);

        return $this->render('etudiant/index.html.twig', compact('etudiants'));
    }
    // #[Route('/etudiant', name: 'app_etudiants')]
    // public function inserer(): Response
    // {
    //     return $this->render('etudiant/index.html.twig', [
    //         'controller_name' => 'Insertion',
    //     ]);
    // }
}
