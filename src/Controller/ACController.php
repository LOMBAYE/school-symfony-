<?php

namespace App\Controller;

use App\Repository\ACRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ACController extends AbstractController
{
    #[Route('/ac', name: 'app_a_c')]
    public function index(ACRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {   $acs = $paginator->paginate($repo->findAll(),
        $request->query->getInt('page',1),
        10);
        // return $this->render('ac/index.html.twig', [
        //     'controller_name' => 'ACController',
        // ]);
        return $this->render('ac/index.html.twig', compact('acs'));

    }
}
