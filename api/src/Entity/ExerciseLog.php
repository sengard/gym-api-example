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
class ExerciseLog extends AbstractDate
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
     * @var Person|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Person")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var Exercise|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Exercise")
     * @ORM\JoinColumn(nullable=false)
     */
    private $exercise;

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
     * @var QuantitativeValue|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ORM\JoinColumn(nullable=false)
     */
    private $baseWeight;

    /**
     * @var QuantitativeValue|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ORM\JoinColumn(nullable=false)
     */
    private $baseRange;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer",nullable=true)
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

    public function setUser(?Person $user): void
    {
        $this->user = $user;
    }

    public function getUser(): ?Person
    {
        return $this->user;
    }

    public function setExercise(?Exercise $exercise): void
    {
        $this->exercise = $exercise;
    }

    public function getExercise(): ?Exercise
    {
        return $this->exercise;
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

    public function setBaseWeight(?QuantitativeValue $baseWeight): void
    {
        $this->baseWeight = $baseWeight;
    }

    public function getBaseWeight(): ?QuantitativeValue
    {
        return $this->baseWeight;
    }

    public function setBaseRange(?QuantitativeValue $baseRange): void
    {
        $this->baseRange = $baseRange;
    }

    public function getBaseRange(): ?QuantitativeValue
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
