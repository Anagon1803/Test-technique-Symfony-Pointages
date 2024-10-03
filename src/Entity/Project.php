<?php

declare(strict_types = 1);

namespace App\Entity;

use App\Repository\ProjectRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{

    #[ORM\Column(length: 255)]
    private ?string            $address   = null;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: ProjectClocking::class, cascade: ['persist', 'remove'])]
    private Collection $projectClockings;


    #[Assert\GreaterThan(propertyPath: 'dateStart')]
    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?DateTimeInterface $dateEnd   = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?DateTimeInterface $dateStart = null;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int               $id        = null;

    #[ORM\Column(length: 255)]
    private ?string            $name      = null;

    public function __construct()
    {
        $this->projectClockings = new ArrayCollection();
    }

    /**
     * @return Collection<int, ProjectClocking>
     */
    public function getProjectClockings(): Collection
    {
        return $this->projectClockings;
    }

    public function addProjectClocking(ProjectClocking $projectClocking): static
    {
        if (!$this->projectClockings->contains($projectClocking)) {
            $this->projectClockings->add($projectClocking);
            $projectClocking->setProject($this);
        }

        return $this;
    }

    public function removeProjectClocking(ProjectClocking $projectClocking): static
    {
        if ($this->projectClockings->removeElement($projectClocking)) {
            // Set the owning side to null (unless already changed)
            if ($projectClocking->getProject() === $this) {
                $projectClocking->setProject(null);
            }
        }

        return $this;
    }




    public function getAddress() : ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address) : void
    {
        $this->address = $address;
    }

    /**
     * @return Collection<int, Clocking>
     */

    public function getDateEnd() : ?DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(?DateTimeInterface $dateEnd) : void
    {
        $this->dateEnd = $dateEnd;
    }

    public function getDateStart() : ?DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(?DateTimeInterface $dateStart) : void
    {
        $this->dateStart = $dateStart;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getName() : ?string
    {
        return $this->name;
    }

    public function setName(string $name) : static
    {
        $this->name = $name;

        return $this;
    }
}
