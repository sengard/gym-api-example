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
class ExerciseWorkoutSetup extends AbstractDate
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
     * @var int|null
     *
     * @ORM\Column(type="integer",nullable=true)
     */
    private $order;

    /**
     * @var Workouts|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Workouts", inversedBy="exerciseWorkoutSetup")
     * @ORM\JoinColumn(nullable=false)
     */
    private $workout;

    /**
     * @var ExerciseMaidenByUser|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\ExerciseMaidenByUser")
     * @ORM\JoinColumn(nullable=false)
     */
    private $exerciseMadenByUser;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer",nullable=true)
     */
    private $AfterExerciseRestPeriod;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setOrder(?int $order): void
    {
        $this->order = $order;
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function setWorkout(?Workouts $workout): void
    {
        $this->workout = $workout;
    }

    public function getWorkout(): ?Workouts
    {
        return $this->workout;
    }

    public function setExerciseMadenByUser(?ExerciseMaidenByUser $exerciseMadenByUser): void
    {
        $this->exerciseMadenByUser = $exerciseMadenByUser;
    }

    public function getExerciseMadenByUser(): ?ExerciseMaidenByUser
    {
        return $this->exerciseMadenByUser;
    }

    public function setAfterExerciseRestPeriod(?int $AfterExerciseRestPeriod): void
    {
        $this->AfterExerciseRestPeriod = $AfterExerciseRestPeriod;
    }

    public function getAfterExerciseRestPeriod(): ?int
    {
        return $this->AfterExerciseRestPeriod;
    }
}
