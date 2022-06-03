<?php

namespace App\Controller;

use App\Repository\RPRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RPController extends AbstractController
{
    #[Route('/rp', name: 'app_r_p')]
    public function index(RPRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {  $rps = $paginator->paginate($repo->findAll(),
        $request->query->getInt('page',1),
        10);
        // return $this->render('rp/index.html.twig', [
        //     'controller_name' => 'RPController',
        // ]);
        return $this->render('rp/index.html.twig', compact('rps'));
    }
}
