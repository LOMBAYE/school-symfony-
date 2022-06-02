<?php

namespace App\Entity;

use App\Entity\Personne;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfesseurRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: ProfesseurRepository::class)]
class Professeur extends Personne
{
   
    #[ORM\Column(type: 'string', length: 50)]
    private $grade;

    #[ORM\ManyToMany(targetEntity: Module::class, inversedBy: 'professeurs')]
    private $modules;

    #[ORM\ManyToOne(targetEntity: RP::class, inversedBy: 'professeurs')]
    #[ORM\JoinColumn(nullable: false)]
    private $rP;

    #[ORM\ManyToMany(targetEntity: Classe::class, inversedBy: 'professeurs')]
    private $classes;

    public function __construct()
    {
        $this->modules = new ArrayCollection();
        $this->classes = new ArrayCollection();
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * @return Collection<int, Module>
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(Module $module): self
    {
        if (!$this->modules->contains($module)) {
            $this->modules[] = $module;
        }

        return $this;
    }

    public function removeModule(Module $module): self
    {
        $this->modules->removeElement($module);

        return $this;
    }

    public function getRP(): ?RP
    {
        return $this->rP;
    }

    public function setRP(?RP $rP): self
    {
        $this->rP = $rP;

        return $this;
    }

    /**
     * @return Collection<int, Classe>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClass(Classe $class): self
    {
        if (!$this->classes->contains($class)) {
            $this->classes[] = $class;
        }

        return $this;
    }

    public function removeClass(Classe $class): self
    {
        $this->classes->removeElement($class);

        return $this;
    }
}
