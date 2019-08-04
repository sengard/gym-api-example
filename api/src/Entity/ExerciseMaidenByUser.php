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
class ExerciseMaidenByUser extends AbstractHasUser
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
     * @var string|null
     *
     * @ORM\Column(type="text",nullable=true)
     */
    private $language;

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
     * @var QuantitativeValue|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ORM\JoinColumn(nullable=false)
     */
    private $baseWeight;

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

    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
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

    public function setBaseWeight(?QuantitativeValue $baseWeight): void
    {
        $this->baseWeight = $baseWeight;
    }

    public function getBaseWeight(): ?QuantitativeValue
    {
        return $this->baseWeight;
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
