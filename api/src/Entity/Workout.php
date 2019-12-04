<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Enum\DayOfWeek;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/ExerciseAction Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/ExerciseAction")
 */
class Workout extends AbstractHasUser
{
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(type="guid")
     * @Assert\Uuid
     *  @Groups({"withWorkouts"})
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
     *  @Groups({"withWorkouts"})
     */
    private $dayOfWeek;

    /**
     * @var Collection<ExerciseWorkout>|null
     *
     * @ORM\OneToMany(targetEntity="App\Entity\ExerciseWorkout", mappedBy="workout")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(nullable=false, unique=true)})
     */
    private $exerciseWorkouts;

    public function __construct()
    {
        $this->exerciseWorkouts = new ArrayCollection();
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

    public function setDayOfWeek(?string $dayOfWeek): void
    {
        $this->dayOfWeek = $dayOfWeek;
    }

    public function getDayOfWeek(): ?string
    {
        return $this->dayOfWeek;
    }

    public function addExerciseWorkout(ExerciseWorkout $exerciseWorkout): void
    {
        $this->exerciseWorkouts[] = $exerciseWorkout;
    }

    public function removeExerciseWorkout(ExerciseWorkout $exerciseWorkout): void
    {
        $this->exerciseWorkouts->removeElement($exerciseWorkout);
    }

    public function getExerciseWorkouts(): Collection
    {
        return $this->exerciseWorkouts;
    }
}
