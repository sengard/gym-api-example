<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Serializer\Filter\GroupFilter;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/ExerciseAction Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/ExerciseAction")
 */
class ExerciseWorkout
{
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(type="guid")
     * @Assert\Uuid
     * @Groups({"workout"})
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"workout"})
     */
    private $exerciseOrder;

    /**
     * @var Workout|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Workout", inversedBy="exerciseWorkouts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $workout;

    /**
     * @var Exercise|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Exercise")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"workout"})
     */
    private $exercise;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"workout"})
     */
    private $afterExerciseRestPeriod;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"workout"})
     */
    private $betweenSetsRestPeriod;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"workout"})
     */
    private $baseRep;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"workout"})
     */
    private $baseSet;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"workout"})
     */
    private $baseWeight;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"workout"})
     */
    private $baseRange;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"workout"})
     */
    private $baseTime;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setExerciseOrder(?int $exerciseOrder): void
    {
        $this->exerciseOrder = $exerciseOrder;
    }

    public function getExerciseOrder(): ?int
    {
        return $this->exerciseOrder;
    }

    public function setWorkout(?Workout $workout): void
    {
        $this->workout = $workout;
    }

    public function getWorkout(): ?Workout
    {
        return $this->workout;
    }

    public function setExercise(?Exercise $exercise): void
    {
        $this->exercise = $exercise;
    }

    public function getExercise(): ?Exercise
    {
        return $this->exercise;
    }

    public function setAfterExerciseRestPeriod(?int $afterExerciseRestPeriod): void
    {
        $this->afterExerciseRestPeriod = $afterExerciseRestPeriod;
    }

    public function getAfterExerciseRestPeriod(): ?int
    {
        return $this->afterExerciseRestPeriod;
    }

    public function setBetweenSetsRestPeriod(?int $betweenSetsRestPeriod): void
    {
        $this->betweenSetsRestPeriod = $betweenSetsRestPeriod;
    }

    public function getBetweenSetsRestPeriod(): ?int
    {
        return $this->betweenSetsRestPeriod;
    }

    public function setBaseRep(?int $baseRep): void
    {
        $this->baseRep = $baseRep;
    }

    public function getBaseRep(): ?int
    {
        return $this->baseRep;
    }

    public function setBaseSet(?int $baseSet): void
    {
        $this->baseSet = $baseSet;
    }

    public function getBaseSet(): ?int
    {
        return $this->baseSet;
    }

    public function setBaseWeight(?int $baseWeight): void
    {
        $this->baseWeight = $baseWeight;
    }

    public function getBaseWeight(): ?int
    {
        return $this->baseWeight;
    }

    public function setBaseRange(?int $baseRange): void
    {
        $this->baseRange = $baseRange;
    }

    public function getBaseRange(): ?int
    {
        return $this->baseRange;
    }

    public function setBaseTime(?int $baseTime): void
    {
        $this->baseTime = $baseTime;
    }

    public function getBaseTime(): ?int
    {
        return $this->baseTime;
    }
}
