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
class ExercisePlan
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
     * @var QuantitativeValue
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $activityDuration;

    /**
     * @var QuantitativeValue
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $activityFrequency;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Assert\NotNull
     */
    private $additionalVariable;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Assert\NotNull
     */
    private $exerciseType;

    /**
     * @var QuantitativeValue
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $intensity;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     * @Assert\NotNull
     */
    private $repetition;

    /**
     * @var QuantitativeValue
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $restPeriod;

    /**
     * @var QuantitativeValue
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $workload;

    /**
     * @var AnatomicalStructure
     *
     * @ORM\OneToOne(targetEntity="App\Entity\AnatomicalStructure")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $associatedAnatomy;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setActivityDuration(QuantitativeValue $activityDuration): void
    {
        $this->activityDuration = $activityDuration;
    }

    public function getActivityDuration(): QuantitativeValue
    {
        return $this->activityDuration;
    }

    public function setActivityFrequency(QuantitativeValue $activityFrequency): void
    {
        $this->activityFrequency = $activityFrequency;
    }

    public function getActivityFrequency(): QuantitativeValue
    {
        return $this->activityFrequency;
    }

    public function setAdditionalVariable(string $additionalVariable): void
    {
        $this->additionalVariable = $additionalVariable;
    }

    public function getAdditionalVariable(): string
    {
        return $this->additionalVariable;
    }

    public function setExerciseType(string $exerciseType): void
    {
        $this->exerciseType = $exerciseType;
    }

    public function getExerciseType(): string
    {
        return $this->exerciseType;
    }

    public function setIntensity(QuantitativeValue $intensity): void
    {
        $this->intensity = $intensity;
    }

    public function getIntensity(): QuantitativeValue
    {
        return $this->intensity;
    }

    /**
     * @param float $repetition
     */
    public function setRepetition($repetition): void
    {
        $this->repetition = $repetition;
    }

    /**
     * @return float
     */
    public function getRepetition()
    {
        return $this->repetition;
    }

    public function setRestPeriod(QuantitativeValue $restPeriod): void
    {
        $this->restPeriod = $restPeriod;
    }

    public function getRestPeriod(): QuantitativeValue
    {
        return $this->restPeriod;
    }

    public function setWorkload(QuantitativeValue $workload): void
    {
        $this->workload = $workload;
    }

    public function getWorkload(): QuantitativeValue
    {
        return $this->workload;
    }

    public function setAssociatedAnatomy(AnatomicalStructure $associatedAnatomy): void
    {
        $this->associatedAnatomy = $associatedAnatomy;
    }

    public function getAssociatedAnatomy(): AnatomicalStructure
    {
        return $this->associatedAnatomy;
    }
}
