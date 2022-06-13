<?php

namespace App\DataFixtures;

use App\Entity\RP;
use App\Entity\Classe;
use App\Entity\Etudiant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;


class ClasseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    { 

        // $niveaux=["L1","L2","L3","M1","M2","Doctorat"];
        // $filieres=["Maths","PC","TDSI","Philo","Medecine","Science Po"];
        // for ($i = 1; $i <=20; $i++) {
        //     $faker = Factory::create();
        //     $user = new RP();
        //     $user->setNomComplet($faker->name());
        //     $user->setLogin($faker->email());
        //     $user->setPassword($faker->password());
        //     $manager->persist($user);
        // $pos= rand(0,5);
        // $classe = new Classe();
    
        // $classe->setNiveau($niveaux[$pos]);
        // $classe->setFiliere($niveaux[$pos]);
        // $classe->setLibelle($niveaux[$pos]."".$filieres[$pos]);
        // $manager->persist($classe);
        // $classe->setRP($user);
        // // $this->addReference("Classe".$i, $classe);
        // }
       

        $manager->flush();
    }
}
