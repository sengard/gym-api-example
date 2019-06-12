<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Enum\PhysicalActivityCategory;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Fitness-related activity designed for a specific health-related purpose, including defined exercise routines as well as activity prescribed by a clinician.
 *
 * @see http://schema.org/ExercisePlan Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/ExercisePlan")
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
     * @var QuantitativeValue|null length of time to engage in the activity
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/activityDuration")
     */
    private $activityDuration;

    /**
     * @var QuantitativeValue|null how often one should engage in the activity
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/activityFrequency")
     */
    private $activityFrequency;

    /**
     * @var string|null Any additional component of the exercise prescription that may need to be articulated to the patient. This may include the order of exercises, the number of repetitions of movement, quantitative distance, progressions over time, etc.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/additionalVariable")
     */
    private $additionalVariable;

    /**
     * @var string[]|null type(s) of exercise or activity, such as strength training, flexibility training, aerobics, cardiac rehabilitation, etc
     *
     * @ORM\Column(type="simple_array", nullable=true)
     * @ApiProperty(iri="http://schema.org/exerciseType")
     */
    private $exerciseTypes;

    /**
     * @var QuantitativeValue|null Quantitative measure gauging the degree of force involved in the exercise, for example, heartbeats per minute. May include the velocity of the movement.
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/intensity")
     */
    private $intensity;

    /**
     * @var float|null number of times one should repeat the activity
     *
     * @ORM\Column(type="float", nullable=true)
     * @ApiProperty(iri="http://schema.org/repetitions")
     */
    private $repetition;

    /**
     * @var QuantitativeValue|null how often one should break from the activity
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/restPeriods")
     */
    private $restPeriod;

    /**
     * @var QuantitativeValue|null quantitative measure of the physiologic output of the exercise; also referred to as energy expenditure
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/workload")
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

    /**
     * @var string
     *
     * @ORM\Column
     * @Assert\NotNull
     * @Assert\Choice(callback={"PhysicalActivityCategory", "toArray"})
     */
    private $category;

    public function __construct()
    {
        $this->exerciseTypes = new ArrayCollection();
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setActivityDuration(?QuantitativeValue $activityDuration): void
    {
        $this->activityDuration = $activityDuration;
    }

    public function getActivityDuration(): ?QuantitativeValue
    {
        return $this->activityDuration;
    }

    public function setActivityFrequency(?QuantitativeValue $activityFrequency): void
    {
        $this->activityFrequency = $activityFrequency;
    }

    public function getActivityFrequency(): ?QuantitativeValue
    {
        return $this->activityFrequency;
    }

    public function setAdditionalVariable(?string $additionalVariable): void
    {
        $this->additionalVariable = $additionalVariable;
    }

    public function getAdditionalVariable(): ?string
    {
        return $this->additionalVariable;
    }

    public function addExerciseType(string $exerciseType): void
    {
        $this->exerciseTypes[] = $exerciseType;
    }

    public function removeExerciseType(string $exerciseType): void
    {
        $this->exerciseTypes->removeElement($exerciseType);
    }

    public function getExerciseTypes(): Collection
    {
        return $this->exerciseTypes;
    }

    public function setIntensity(?QuantitativeValue $intensity): void
    {
        $this->intensity = $intensity;
    }

    public function getIntensity(): ?QuantitativeValue
    {
        return $this->intensity;
    }

    /**
     * @param float|null $repetition
     */
    public function setRepetition($repetition): void
    {
        $this->repetition = $repetition;
    }

    /**
     * @return float|null
     */
    public function getRepetition()
    {
        return $this->repetition;
    }

    public function setRestPeriod(?QuantitativeValue $restPeriod): void
    {
        $this->restPeriod = $restPeriod;
    }

    public function getRestPeriod(): ?QuantitativeValue
    {
        return $this->restPeriod;
    }

    public function setWorkload(?QuantitativeValue $workload): void
    {
        $this->workload = $workload;
    }

    public function getWorkload(): ?QuantitativeValue
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

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getCategory(): string
    {
        return $this->category;
    }
}
