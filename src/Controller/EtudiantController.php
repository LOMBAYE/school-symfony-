<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Entity\Etudiant;
use App\Entity\Inscription;
use App\Form\EtudiantFormType;
use App\Repository\ClasseRepository;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\InscriptionRepository;
use App\Repository\AnneeScolaireRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'app_etudiant')]
    public function index(InscriptionRepository $repo, PaginatorInterface $paginator, Request $request): Response
    { 
        $etudiants = $paginator->paginate($repo->findAll(),
         $request->query->getInt('page',1),
         10);

        // return $this->render('etudiant/index.html.twig', compact('etudiants'));
        return $this->render('etudiant/index.html.twig', [
                    'controller_name' => 'Insertion',
                    'title' => 'Liste des inscrits',
                    'etudiants'=>$etudiants,
                ]);
    }
  
    #[Route('/etudiant/add', name: 'add_etudiant')]

    public function addEtudiant(Request $request,AnneeScolaireRepository $an,EntityManagerInterface $manager,UserPasswordHasherInterface $hasher): Response
    {
        $etudiant = new Etudiant();
        $form = $this->createForm(EtudiantFormType::class, $etudiant);
        $matricule="MAT-".date("dmYhis");
        $etudiant->setMatricule($matricule);
        $etudiant->setPassword('password');
   
       $an=$an->findOneByEtat(1);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {   
            $hash=$hasher->hashPassword($etudiant,$etudiant->getPassword());
            $etudiant->setPassword($hash);
            $manager->persist($etudiant);
            $ins= new Inscription();
            $ins->setEtudiant($etudiant);
            $ins->setAnneeScolaire($an);
            $classe=$form->get('classe')->getData();
            $ins->setClasse($classe);
            $ins->setAc($this->getUser());
            $manager->persist($ins);
            $manager->flush();    
          return  $this->redirectToRoute('app_etudiant');

        }
        return $this->render("etudiant/add.html.twig", [
            "form_title" => "Ajouter un etudiant",
            "form_etudiant" => $form->createView(),
        ]);
    }
}
