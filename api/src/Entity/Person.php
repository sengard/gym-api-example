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
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/familyName")
     */
    private $familyName;

    /**
     * @var string|null Given name. In the U.S., the first name of a Person. This can be used along with familyName instead of the name property.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/givenName")
     */
    private $givenName;

    /**
     * @var \DateTimeInterface|null date of birth
     *
     * @ORM\Column(type="date", nullable=true)
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
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/gender")
     */
    private $gender;

    /**
     * @var string|null Of a [Person](http://schema.org/Person), and less typically of an [Organization](http://schema.org/Organization), to indicate a known language. We do not distinguish skill levels or reading/writing/speaking/signing here. Use language codes from the [IETF BCP 47 standard](http://tools.ietf.org/html/bcp47).
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/knowsLanguage")
     */
    private $knowsLanguage;

    /**
     * @var int|null the weight of the product or person
     *
     * @ORM\Column(type="integer", nullable=true)
     * @ApiProperty(iri="http://schema.org/weight")
     */
    private $weight;

    /**
     * @var int|null the height of the item
     *
     * @ORM\Column(type="integer", nullable=true)
     * @ApiProperty(iri="http://schema.org/height")
     */
    private $height;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $weightMeasurement;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $rangeMeasurement;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $caloriesMeasurement;

    /**
     * @var User|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="user")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",nullable=false)
     */
    private $user;

    public function __construct()
    {
        $this->follows = new ArrayCollection();
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

    public function setWeight(?int $weight): void
    {
        $this->weight = $weight;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setHeight(?int $height): void
    {
        $this->height = $height;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setWeightMeasurement(?string $weightMeasurement): void
    {
        $this->weightMeasurement = $weightMeasurement;
    }

    public function getWeightMeasurement(): ?string
    {
        return $this->weightMeasurement;
    }

    public function setRangeMeasurement(?string $rangeMeasurement): void
    {
        $this->rangeMeasurement = $rangeMeasurement;
    }

    public function getRangeMeasurement(): ?string
    {
        return $this->rangeMeasurement;
    }

    public function setCaloriesMeasurement(?string $caloriesMeasurement): void
    {
        $this->caloriesMeasurement = $caloriesMeasurement;
    }

    public function getCaloriesMeasurement(): ?string
    {
        return $this->caloriesMeasurement;
    }

    /**
     * @param User|null $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return User|null
     */
    public function getUser()
    {
        return $this->user;
    }
}
