<?php

namespace App\DataFixtures;

use App\Entity\AC;
use App\Entity\AnneeScolaire;
use App\Entity\RP;
use Faker\Factory;
use App\Entity\Classe;
use App\Entity\Etudiant;
use App\Entity\Inscription;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\Query\Expr\Andx;

class InscriptionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {   
    // $faker = Factory::create();
    // $niveaux=["L1","L2","L3","M1","M2","Doctorat"];
    //     $filieres=["Maths","PC","TDSI","Philo","Medecine","Science Po"];
    //     for ($i = 1; $i <=20; $i++) {
    //         $faker = Factory::create();
    //         $ac = new AC();
    //         $ac->setNomComplet($faker->name());
    //         $ac->setLogin($faker->email());
    //         $ac->setPassword($faker->password());
    //         $manager->persist($ac);

    // // for ($i = 1; $i < 6 ; $i++) {
    //    $user = new Etudiant();
    // $user->setNomComplet($faker->name());
    // $user->setLogin($faker->unique()->email());
    // $user->setPassword($faker->password());
    // $user->setSexe(0);
    // $user->setMatricule("MAT111");
    // $manager->persist($user);

    // $an=new AnneeScolaire();
    // $an->setLibelle('2022-2023');
    // $manager->persist($an);

    // $ins= new Inscription();
    // $ins->setEtudiant($user);
    // $ins->setAc($ac);
    // $ins->setAnneeScolaire($an);
    // $manager->persist($ins);


    //     $manager->flush();
    // }   
}
}
