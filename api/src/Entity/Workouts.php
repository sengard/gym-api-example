<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Enum\DayOfWeek;
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
class Workouts extends AbstractHasUser
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Plan", inversedBy="workouts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $plan;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true)
     * @Assert\Choice(callback={"DayOfWeek", "toArray"})
     */
    private $dayNumber;

    /**
     * @var Collection<ExerciseWorkoutSetup>|null
     *
     * @ORM\OneToMany(targetEntity="App\Entity\ExerciseWorkoutSetup", mappedBy="workouts")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(nullable=false, unique=true)})
     */
    private $exerciseWorkoutSetups;

    public function __construct()
    {
        $this->exerciseWorkoutSetups = new ArrayCollection();
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

    public function setDayNumber(?string $dayNumber): void
    {
        $this->dayNumber = $dayNumber;
    }

    public function getDayNumber(): ?string
    {
        return $this->dayNumber;
    }

    public function addExerciseWorkoutSetup(ExerciseWorkoutSetup $exerciseWorkoutSetup): void
    {
        $this->exerciseWorkoutSetups[] = $exerciseWorkoutSetup;
    }

    public function removeExerciseWorkoutSetup(ExerciseWorkoutSetup $exerciseWorkoutSetup): void
    {
        $this->exerciseWorkoutSetups->removeElement($exerciseWorkoutSetup);
    }

    public function getExerciseWorkoutSetups(): Collection
    {
        return $this->exerciseWorkoutSetups;
    }
}
