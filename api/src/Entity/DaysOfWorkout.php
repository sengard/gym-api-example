<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
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
class DaysOfWorkout extends AbstractThing
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
     * @var WorkoutPlan|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\WorkoutPlan")
     * @ORM\JoinColumn(nullable=false)
     */
    private $workoutPlan;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer",nullable=true)
     */
    private $daysOfMonth;

    /**
     * @var DaysOfWorkoutExercise|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\DaysOfWorkoutExercise")
     * @ORM\JoinColumn(nullable=false)
     */
    private $daysOfWOrkoutExercise;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setWorkoutPlan(?WorkoutPlan $workoutPlan): void
    {
        $this->workoutPlan = $workoutPlan;
    }

    public function getWorkoutPlan(): ?WorkoutPlan
    {
        return $this->workoutPlan;
    }

    public function setDaysOfMonth(?int $daysOfMonth): void
    {
        $this->daysOfMonth = $daysOfMonth;
    }

    public function getDaysOfMonth(): ?int
    {
        return $this->daysOfMonth;
    }

    public function setDaysOfWOrkoutExercise(?DaysOfWorkoutExercise $daysOfWOrkoutExercise): void
    {
        $this->daysOfWOrkoutExercise = $daysOfWOrkoutExercise;
    }

    public function getDaysOfWOrkoutExercise(): ?DaysOfWorkoutExercise
    {
        return $this->daysOfWOrkoutExercise;
    }
}
