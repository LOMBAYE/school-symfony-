<?php

namespace App\Controller;

use App\Entity\RP;
use App\Form\RpFormType;
use App\Repository\RPRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

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

    #[Route('/rp/add', name: 'add_rp')]
    public function ajouterRp(Request $request,EntityManagerInterface $manager,UserPasswordHasherInterface $hasher):Response
    {
        $rp= new RP();
        $form = $this->createForm(RpFormType::class, $rp);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {   
            $hash=$hasher->hashPassword($rp,$rp->getPassword());
            $rp->setPassword($hash);
            $manager->persist($rp);
            $manager->flush();    
          return $this->redirectToRoute('app_r_p');
    }
    return $this->render("rp/add.html.twig", [
        "form_title" => "Ajouter un responsable",
        "form" => $form->createView(),
    ]);
}
}
