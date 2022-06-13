<?php

namespace App\Entity;

use App\Entity\Personne;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;


#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name:'`user`')]

#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name:"role", type:"string")]
#[ORM\DiscriminatorMap(["rp"=>"RP", "ac"=>"AC", "etudiant"=>"Etudiant"])]
#[UniqueEntity(fields: ['login'], message: 'There is already an account with this login')]
class User extends Personne implements UserInterface,PasswordAuthenticatedUserInterface
{
  
    #[ORM\Column(type: 'string', length: 255)]
    protected $login;

    #[ORM\Column(type: 'string', length: 255)]
    protected $password;

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): array{
        return [];
    }
    public function eraseCredentials(){

    }
    public function getUserIdentifier(): string{
        return '';
    }

}
