<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
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
 * @UniqueEntity("telephone")
 */
class Person
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
     * @var string|null an additional name for a Person, can be used for a middle name
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/additionalName")
     */
    private $additionalName;

    /**
     * @var PostalAddress|null physical address of the item
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\PostalAddress")
     * @ApiProperty(iri="http://schema.org/address")
     */
    private $address;

    /**
     * @var Organization|null An organization that this person is affiliated with. For example, a school/university, a club, or a team.
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Organization")
     * @ApiProperty(iri="http://schema.org/affiliation")
     */
    private $affiliation;

    /**
     * @var \DateTimeInterface|null date of birth
     *
     * @ORM\Column(type="date", nullable=true)
     * @ApiProperty(iri="http://schema.org/birthDate")
     * @Assert\Date
     */
    private $birthDate;

    /**
     * @var Place|null the place where the person was born
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Place")
     * @ApiProperty(iri="http://schema.org/birthPlace")
     */
    private $birthPlace;

    /**
     * @var Place|null a contact location for a person's residence
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Place")
     * @ApiProperty(iri="http://schema.org/homeLocation")
     */
    private $homeLocation;

    /**
     * @var string|null the Dun & Bradstreet DUNS number for identifying an organization or business person
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/duns")
     */
    private $dun;

    /**
     * @var Collection<Person>|null the most generic uni-directional social relation
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Person")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     * @ApiProperty(iri="http://schema.org/follows")
     */
    private $follows;

    /**
     * @var Person|null the most generic bi-directional social/work relation
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Person")
     * @ApiProperty(iri="http://schema.org/knows")
     */
    private $know;

    /**
     * @var string|null Gender of the person. While http://schema.org/Male and http://schema.org/Female may be used, text strings are also acceptable for people who do not identify as a binary gender.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/gender")
     */
    private $gender;

    /**
     * @var Occupation
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Occupation")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $hasOccupation;

    /**
     * @var QuantitativeValue|null the height of the item
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/height")
     */
    private $height;

    /**
     * @var string|null the job title of the person (for example, Financial Manager)
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/jobTitle")
     */
    private $jobTitle;

    /**
     * @var Collection<Language>|null
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Language")
     */
    private $knowsLanguages;

    /**
     * @var Country|null nationality of the person
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Country")
     * @ApiProperty(iri="http://schema.org/nationality")
     */
    private $nationality;

    /**
     * @var string|null the telephone number
     *
     * @ORM\Column(type="text", nullable=true, unique=true)
     * @ApiProperty(iri="http://schema.org/telephone")
     */
    private $telephone;

    /**
     * @var QuantitativeValue|null the weight of the product or person
     *
     * @ORM\OneToOne(targetEntity="App\Entity\QuantitativeValue")
     * @ApiProperty(iri="http://schema.org/weight")
     */
    private $weight;

    /**
     * @var Organization|null organizations that the person works for
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Organization")
     * @ApiProperty(iri="http://schema.org/worksFor")
     */
    private $worksFor;

    public function __construct()
    {
        $this->follows = new ArrayCollection();
        $this->knowsLanguages = new ArrayCollection();
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

    public function setAdditionalName(?string $additionalName): void
    {
        $this->additionalName = $additionalName;
    }

    public function getAdditionalName(): ?string
    {
        return $this->additionalName;
    }

    public function setAddress(?PostalAddress $address): void
    {
        $this->address = $address;
    }

    public function getAddress(): ?PostalAddress
    {
        return $this->address;
    }

    public function setAffiliation(?Organization $affiliation): void
    {
        $this->affiliation = $affiliation;
    }

    public function getAffiliation(): ?Organization
    {
        return $this->affiliation;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthPlace(?Place $birthPlace): void
    {
        $this->birthPlace = $birthPlace;
    }

    public function getBirthPlace(): ?Place
    {
        return $this->birthPlace;
    }

    public function setHomeLocation(?Place $homeLocation): void
    {
        $this->homeLocation = $homeLocation;
    }

    public function getHomeLocation(): ?Place
    {
        return $this->homeLocation;
    }

    public function setDun(?string $dun): void
    {
        $this->dun = $dun;
    }

    public function getDun(): ?string
    {
        return $this->dun;
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

    public function setKnow(?Person $know): void
    {
        $this->know = $know;
    }

    public function getKnow(): ?Person
    {
        return $this->know;
    }

    public function setGender(?string $gender): void
    {
        $this->gender = $gender;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setHasOccupation(Occupation $hasOccupation): void
    {
        $this->hasOccupation = $hasOccupation;
    }

    public function getHasOccupation(): Occupation
    {
        return $this->hasOccupation;
    }

    public function setHeight(?QuantitativeValue $height): void
    {
        $this->height = $height;
    }

    public function getHeight(): ?QuantitativeValue
    {
        return $this->height;
    }

    public function setJobTitle(?string $jobTitle): void
    {
        $this->jobTitle = $jobTitle;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function addKnowsLanguage(Language $knowsLanguage): void
    {
        $this->knowsLanguages[] = $knowsLanguage;
    }

    public function removeKnowsLanguage(Language $knowsLanguage): void
    {
        $this->knowsLanguages->removeElement($knowsLanguage);
    }

    public function getKnowsLanguages(): Collection
    {
        return $this->knowsLanguages;
    }

    public function setNationality(?Country $nationality): void
    {
        $this->nationality = $nationality;
    }

    public function getNationality(): ?Country
    {
        return $this->nationality;
    }

    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setWeight(?QuantitativeValue $weight): void
    {
        $this->weight = $weight;
    }

    public function getWeight(): ?QuantitativeValue
    {
        return $this->weight;
    }

    public function setWorksFor(?Organization $worksFor): void
    {
        $this->worksFor = $worksFor;
    }

    public function getWorksFor(): ?Organization
    {
        return $this->worksFor;
    }
}
