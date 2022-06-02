<?php

namespace App\DataFixtures;

use App\Entity\AC;
use App\Entity\RP;
use Faker\Factory;
use App\Entity\Classe;
use App\Entity\Module;
use App\Entity\Etudiant;
use App\Entity\AnneeScolaire;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void{
    $faker = Factory::create();
  
    //  for ($i = 1; $i < 6 ; $i++) {
    //      $rp=new AC();
    //     $rp->setNomComplet('Dieye'.$i);
    //     $rp->setLogin('dieye@gmail.com')
    //     ->setPassword('password') ;
    //     $manager->persist($rp);
    //     for ($i=2019; $i <2025 ; $i++) {
    //         $data=new AnneeScolaire();
    //         $annee= $i."-".($i+1);
    //         $data->setLibelle($annee);  
    //     $manager->persist($data);
    //     $manager->flush(); 
    // }
    // for ($i = 1; $i <=60; $i++) {
    // $user = new Etudiant();
    // $user->setNomComplet($faker->name());
    // $user->setLogin($faker->unique()->email());
    // $user->setPassword($faker->password());
    //     if($i%2==0) {
    //         $user->setSexe(0);
    //     }else{
    //         $user->setSexe(1);
    //     }
    // $user->setMatricule("MAT".$i);
    // $manager->persist($user);
    // }
    // $manager->flush();
}
}
