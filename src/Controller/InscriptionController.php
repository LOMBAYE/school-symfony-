<?php

namespace App\Controller;

use App\Entity\Etudiant;
use App\Entity\Inscription;
use App\Form\InscriptionFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(): Response
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    #[Route('/inscrire', name: 'inscrire')]

    public function inscrireEtudiant(Request $request,EntityManagerInterface $manager): Response{
        $ins = new Inscription();
        $form = $this->createForm(InscriptionFormType::class, $ins);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($ins);
            $manager->flush();
        }

        return $this->render("inscription/add.html.twig", [
            "form_title" => "Inscription d un etudiant",
            "form_etudiant" => $form->createView(),
        ]);
    }

}
