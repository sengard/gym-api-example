<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A person (alive, dead, undead, or fictional).
 *
 * @see http://schema.org/Person Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Person")
 */
class Person extends AbstractDate
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
     * @var string|null Family name. In the U.S., the last name of an Person. This can be used along with givenName instead of the name property.
     *
     * @ORM\Column(type="text",nullable=true)
     * @ApiProperty(iri="http://schema.org/familyName")
     */
    private $familyName;

    /**
     * @var string|null Given name. In the U.S., the first name of a Person. This can be used along with familyName instead of the name property.
     *
     * @ORM\Column(type="text",nullable=true)
     * @ApiProperty(iri="http://schema.org/givenName")
     */
    private $givenName;

    /**
     * @var \DateTimeInterface|null date of birth
     *
     * @ORM\Column(type="date",nullable=true)
     * @ApiProperty(iri="http://schema.org/birthDate")
     * @Assert\Date
     */
    private $birthDate;

    /**
     * @var Collection<Person>|null the most generic uni-directional social relation
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Person")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/follows")
     */
    private $follows;

    /**
     * @var string|null Gender of the person. While http://schema.org/Male and http://schema.org/Female may be used, text strings are also acceptable for people who do not identify as a binary gender.
     *
     * @ORM\Column(type="text",nullable=true)
     * @ApiProperty(iri="http://schema.org/gender")
     */
    private $gender;

    /**
     * @var string|null Of a [Person](http://schema.org/Person), and less typically of an [Organization](http://schema.org/Organization), to indicate a known language. We do not distinguish skill levels or reading/writing/speaking/signing here. Use language codes from the [IETF BCP 47 standard](http://tools.ietf.org/html/bcp47).
     *
     * @ORM\Column(type="text",nullable=true)
     * @ApiProperty(iri="http://schema.org/knowsLanguage")
     */
    private $knowsLanguage;

    /**
     * @var string|null nationality of the person
     *
     * @ORM\Column(type="text",nullable=true)
     * @ApiProperty(iri="http://schema.org/nationality")
     */
    private $nationality;

    /**
     * @var QuantitativeValue|null the weight of the product or person
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/weight")
     */
    private $weight;

    /**
     * @var QuantitativeValue|null the height of the item
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/height")
     */
    private $height;

    /**
     * @var bool|null
     *
     * @ORM\Column(type="boolean",nullable=true)
     */
    private $unitsOfMeasurement;

    /**
     * @var Collection<WorkoutPlan>|null
     *
     * @ORM\OneToMany(targetEntity="App\Entity\WorkoutPlan", mappedBy="owned")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     */
    private $workoutPlans;

    public function __construct()
    {
        $this->follows = new ArrayCollection();
        $this->workoutPlans = new ArrayCollection();
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setFamilyName(?string $familyName): void
    {
        $this->familyName = $familyName;
    }

    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    public function setGivenName(?string $givenName): void
    {
        $this->givenName = $givenName;
    }

    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function addFollow(Person $follow): void
    {
        $this->follows[] = $follow;
    }

    public function removeFollow(Person $follow): void
    {
        $this->follows->removeElement($follow);
    }

    public function getFollows(): Collection
    {
        return $this->follows;
    }

    public function setGender(?string $gender): void
    {
        $this->gender = $gender;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setKnowsLanguage(?string $knowsLanguage): void
    {
        $this->knowsLanguage = $knowsLanguage;
    }

    public function getKnowsLanguage(): ?string
    {
        return $this->knowsLanguage;
    }

    public function setNationality(?string $nationality): void
    {
        $this->nationality = $nationality;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setWeight(?QuantitativeValue $weight): void
    {
        $this->weight = $weight;
    }

    public function getWeight(): ?QuantitativeValue
    {
        return $this->weight;
    }

    public function setHeight(?QuantitativeValue $height): void
    {
        $this->height = $height;
    }

    public function getHeight(): ?QuantitativeValue
    {
        return $this->height;
    }

    public function setUnitsOfMeasurement(?bool $unitsOfMeasurement): void
    {
        $this->unitsOfMeasurement = $unitsOfMeasurement;
    }

    public function getUnitsOfMeasurement(): ?bool
    {
        return $this->unitsOfMeasurement;
    }

    public function addWorkoutPlan(WorkoutPlan $workoutPlan): void
    {
        $this->workoutPlans[] = $workoutPlan;
    }

    public function removeWorkoutPlan(WorkoutPlan $workoutPlan): void
    {
        $this->workoutPlans->removeElement($workoutPlan);
    }

    public function getWorkoutPlans(): Collection
    {
        return $this->workoutPlans;
    }
}
