<?php

namespace App\Entity;

use App\Repository\ProjectClockingRepository;
use Doctrine\ORM\Mapping as ORM;

// #[ORM\Entity]
#[ORM\Table(name: 'project_clocking')]
#[ORM\Entity(repositoryClass: ProjectClockingRepository::class)]
class ProjectClocking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Clocking::class, inversedBy: 'projectsClocked')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clocking $clocking = null;

    #[ORM\ManyToOne(targetEntity: Project::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Project $project = null;

    #[ORM\Column(type: 'decimal', precision: 5, scale: 2)]
    private ?float $duration = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClocking(): ?Clocking
    {
        return $this->clocking;
    }

    public function setClocking(?Clocking $clocking): static
    {
        $this->clocking = $clocking;
    
        return $this;
    }
    
    public function getProject(): ?Project
    {
        return $this->project;
    }
    
    public function setProject(?Project $project): static
    {
        $this->project = $project;
    
        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }
}
