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
class ExerciseSetup extends AbstractDate
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
    private $betweenSetsRestPeriod;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer",nullable=true)
     */
    private $AfterExerciseRestPeriod;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer",nullable=true)
     */
    private $baseRep;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer",nullable=true)
     */
    private $baseSet;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer",nullable=true)
     */
    private $order;

    /**
     * @var QuantitativeValue|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ORM\JoinColumn(nullable=false)
     */
    private $baseWeight;

    /**
     * @var Days|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Days", inversedBy="exerciseSetup")
     * @ORM\JoinColumn(nullable=false)
     */
    private $day;

    /**
     * @var UserExercise|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\UserExercise")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userExercise;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setBetweenSetsRestPeriod(?int $betweenSetsRestPeriod): void
    {
        $this->betweenSetsRestPeriod = $betweenSetsRestPeriod;
    }

    public function getBetweenSetsRestPeriod(): ?int
    {
        return $this->betweenSetsRestPeriod;
    }

    public function setAfterExerciseRestPeriod(?int $AfterExerciseRestPeriod): void
    {
        $this->AfterExerciseRestPeriod = $AfterExerciseRestPeriod;
    }

    public function getAfterExerciseRestPeriod(): ?int
    {
        return $this->AfterExerciseRestPeriod;
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

    public function setOrder(?int $order): void
    {
        $this->order = $order;
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function setBaseWeight(?QuantitativeValue $baseWeight): void
    {
        $this->baseWeight = $baseWeight;
    }

    public function getBaseWeight(): ?QuantitativeValue
    {
        return $this->baseWeight;
    }

    public function setDay(?Days $day): void
    {
        $this->day = $day;
    }

    public function getDay(): ?Days
    {
        return $this->day;
    }

    public function setUserExercise(?UserExercise $userExercise): void
    {
        $this->userExercise = $userExercise;
    }

    public function getUserExercise(): ?UserExercise
    {
        return $this->userExercise;
    }
}
