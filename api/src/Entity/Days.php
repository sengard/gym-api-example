<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/Thing Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Thing")
 */
class Days extends AbstractThing
{
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(type="guid")
     * @Assert\Uuid
     */
    private $id;

    /**
     * @var Plan|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Plan", inversedBy="days")
     * @ORM\JoinColumn(nullable=false)
     */
    private $plan;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer",nullable=true)
     */
    private $dayNumber;

    /**
     * @var Collection<ExerciseSetup>|null
     *
     * @ORM\OneToMany(targetEntity="App\Entity\ExerciseSetup", mappedBy="days")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(nullable=false, unique=true)})
     */
    private $exerciseSetups;

    public function __construct()
    {
        $this->exerciseSetups = new ArrayCollection();
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setPlan(?Plan $plan): void
    {
        $this->plan = $plan;
    }

    public function getPlan(): ?Plan
    {
        return $this->plan;
    }

    public function setDayNumber(?int $dayNumber): void
    {
        $this->dayNumber = $dayNumber;
    }

    public function getDayNumber(): ?int
    {
        return $this->dayNumber;
    }

    public function addExerciseSetup(ExerciseSetup $exerciseSetup): void
    {
        $this->exerciseSetups[] = $exerciseSetup;
    }

    public function removeExerciseSetup(ExerciseSetup $exerciseSetup): void
    {
        $this->exerciseSetups->removeElement($exerciseSetup);
    }

    public function getExerciseSetups(): Collection
    {
        return $this->exerciseSetups;
    }
}
