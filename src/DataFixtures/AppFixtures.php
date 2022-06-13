<?php

namespace App\DataFixtures;

use App\Entity\AC;
use App\Entity\RP;
use Faker\Factory;
use App\Entity\Classe;
use App\Entity\Module;
use App\Entity\Demande;
use App\Entity\Etudiant;
use App\Entity\Professeur;
use App\Entity\AnneeScolaire;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void{
    // $faker = Factory::create();
    // $adresses=['gwye','pikine','yarakh','keur massar','ouakam','dakar'];
    //  for ($i = 0; $i <49  ; $i++) {
    //      $pos=rand(0,5);
    //          $user = new Etudiant();
    // $user->setNomComplet($faker->name());
    // $user->setLogin($faker->unique()->email());
    // $user->setPassword($faker->password());
    // $user->setAdresse($adresses[$pos]);
    // if ($i%2){  
    //      $user->setSexe(0);
    // } else {
    //      $user->setSexe(1);
    // }
    // $user->setMatricule('MATRICULE'.$i);
    // $manager->persist($user);

    // $rp=new RP();
    // $rp->setNomComplet($faker->name());
    // $rp->setLogin($faker->unique()->email());
    // $rp->setPassword($faker->password());
    // $manager->persist($rp);

    // $demande= new Demande();
    // if($i%2==0){
    //     $demande->setMotif('voyage');
    // }else{
    //     $demande->setMotif('maladie');
    // }
    // $demande->setDate(new \DateTime); 
    // $demande->setLibelle('demande');
    // $demande->setRP($rp);
    // $demande->setEtudiant($user);
    // $manager->persist($demande); 

    // $manager->flush();
    
//  
    //  }
}
}
