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
class DaysOfWorkoutExercise extends AbstractDate
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
     * @var int
     *
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $betweenSetsRestPeriod;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $AfterExerciseRestPeriod;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $baseRep;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $baseSet;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @Assert\NotNull
     */
    private $order;

    /**
     * @var QuantitativeValue
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $baseWeight;

    /**
     * @var DaysOfWorkout
     *
     * @ORM\OneToOne(targetEntity="App\Entity\DaysOfWorkout")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $DaysOfWorkout;

    /**
     * @var ExerciseFromUser
     *
     * @ORM\OneToOne(targetEntity="App\Entity\ExerciseFromUser")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $ExerciseFromUser;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setBetweenSetsRestPeriod(int $betweenSetsRestPeriod): void
    {
        $this->betweenSetsRestPeriod = $betweenSetsRestPeriod;
    }

    public function getBetweenSetsRestPeriod(): int
    {
        return $this->betweenSetsRestPeriod;
    }

    public function setAfterExerciseRestPeriod(int $AfterExerciseRestPeriod): void
    {
        $this->AfterExerciseRestPeriod = $AfterExerciseRestPeriod;
    }

    public function getAfterExerciseRestPeriod(): int
    {
        return $this->AfterExerciseRestPeriod;
    }

    public function setBaseRep(int $baseRep): void
    {
        $this->baseRep = $baseRep;
    }

    public function getBaseRep(): int
    {
        return $this->baseRep;
    }

    public function setBaseSet(int $baseSet): void
    {
        $this->baseSet = $baseSet;
    }

    public function getBaseSet(): int
    {
        return $this->baseSet;
    }

    public function setOrder(int $order): void
    {
        $this->order = $order;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setBaseWeight(QuantitativeValue $baseWeight): void
    {
        $this->baseWeight = $baseWeight;
    }

    public function getBaseWeight(): QuantitativeValue
    {
        return $this->baseWeight;
    }

    public function setDaysOfWorkout(DaysOfWorkout $DaysOfWorkout): void
    {
        $this->DaysOfWorkout = $DaysOfWorkout;
    }

    public function getDaysOfWorkout(): DaysOfWorkout
    {
        return $this->DaysOfWorkout;
    }

    public function setExerciseFromUser(ExerciseFromUser $ExerciseFromUser): void
    {
        $this->ExerciseFromUser = $ExerciseFromUser;
    }

    public function getExerciseFromUser(): ExerciseFromUser
    {
        return $this->ExerciseFromUser;
    }
}
