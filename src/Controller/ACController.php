<?php

namespace App\Controller;

use App\Entity\AC;
use App\Form\AcFormType;
use Doctrine\ORM\EntityManager;
use App\Repository\ACRepository;
use App\Repository\ClasseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

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

    #[Route('/ac/add', name: 'add_ac')]
    public function ajouterAc(Request $request,EntityManagerInterface  $manager,UserPasswordHasherInterface $hasher):Response
    {
        $ac= new AC();

        $form = $this->createForm(AcFormType::class, $ac);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {   
            $hash=$hasher->hashPassword($ac,$ac->getPassword());
            $ac->setPassword($hash);
            $manager->persist($ac);
            $manager->flush();
            
            $this->redirectToRoute('app_a_c');
    }
    return $this->render("ac/add.html.twig", [
        "form_title" => "Ajouter un attache",
        "form" => $form->createView(),
    ]);
}
}