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
 * An organization such as a school, NGO, corporation, club, etc.
 *
 * @see http://schema.org/Organization Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Organization")
 */
class Organization extends Thing
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
     * @var PostalAddress|null physical address of the item
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\PostalAddress")
     * @ApiProperty(iri="http://schema.org/address")
     */
    private $address;

    /**
     * @var AggregateRating|null the overall rating, based on a collection of reviews or ratings, of the item
     *
     * @ORM\OneToOne(targetEntity="App\Entity\AggregateRating")
     * @ApiProperty(iri="http://schema.org/aggregateRating")
     */
    private $aggregateRating;

    /**
     * @var Person|null alumni of an organization
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Person")
     * @ApiProperty(iri="http://schema.org/alumni")
     */
    private $alumnus;

    /**
     * @var string|null awards won by or for this item
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/awards")
     */
    private $award;

    /**
     * @var \DateTimeInterface|null the date that this organization was dissolved
     *
     * @ORM\Column(type="date", nullable=true)
     * @ApiProperty(iri="http://schema.org/dissolutionDate")
     * @Assert\Date
     */
    private $dissolutionDate;

    /**
     * @var string|null email address
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/email")
     * @Assert\Email
     */
    private $email;

    /**
     * @var Person|null people working for this organization
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Person")
     * @ApiProperty(iri="http://schema.org/employees")
     */
    private $employee;

    /**
     * @var Person|null a person who founded this organization
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Person")
     * @ApiProperty(iri="http://schema.org/founders")
     */
    private $founder;

    /**
     * @var \DateTimeInterface|null the date that this organization was founded
     *
     * @ORM\Column(type="date", nullable=true)
     * @ApiProperty(iri="http://schema.org/foundingDate")
     * @Assert\Date
     */
    private $foundingDate;

    /**
     * @var string|null The \[Global Location Number\](http://www.gs1.org/gln) (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/globalLocationNumber")
     */
    private $globalLocationNumber;

    /**
     * @var Language
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Language")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $knowsLanguage;

    /**
     * @var Thing
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Thing")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $knowsAbout;

    /**
     * @var Place|null the location of for example where the event is happening, an organization is located, or where an action takes place
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Place")
     * @ApiProperty(iri="http://schema.org/location")
     */
    private $location;

    /**
     * @var Person|null a member of this organization
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Person")
     * @ApiProperty(iri="http://schema.org/members")
     */
    private $member;

    /**
     * @var string[]|null the North American Industry Classification System (NAICS) code for a particular organization or business person
     *
     * @ORM\Column(type="simple_array", nullable=true)
     * @ApiProperty(iri="http://schema.org/naics")
     */
    private $naics;

    /**
     * @var string|null the telephone number
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/telephone")
     */
    private $telephone;

    /**
     * @var string|null The official name of the organization, e.g. the registered company name.
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/legalName")
     */
    private $legalName;

    /**
     * @var string|null an organization identifier that uniquely identifies a legal entity as defined in ISO 17442
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/leiCode")
     */
    private $leiCode;

    /**
     * @var string[]|null the International Standard of Industrial Classification of All Economic Activities (ISIC), Revision 4 code for a particular organization, business person, or place
     *
     * @ORM\Column(type="simple_array", nullable=true)
     * @ApiProperty(iri="http://schema.org/isicV4")
     */
    private $isicV4s;

    /**
     * @var string|null the Value-added Tax ID of the organization or person
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/vatID")
     */
    private $vatID;

    /**
     * @var string|null the Dun & Bradstreet DUNS number for identifying an organization or business person
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/duns")
     */
    private $dun;

    public function __construct()
    {
        $this->naics = new ArrayCollection();
        $this->isicV4s = new ArrayCollection();
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setAddress(?PostalAddress $address): void
    {
        $this->address = $address;
    }

    public function getAddress(): ?PostalAddress
    {
        return $this->address;
    }

    public function setAggregateRating(?AggregateRating $aggregateRating): void
    {
        $this->aggregateRating = $aggregateRating;
    }

    public function getAggregateRating(): ?AggregateRating
    {
        return $this->aggregateRating;
    }

    public function setAlumnus(?Person $alumnus): void
    {
        $this->alumnus = $alumnus;
    }

    public function getAlumnus(): ?Person
    {
        return $this->alumnus;
    }

    public function setAward(?string $award): void
    {
        $this->award = $award;
    }

    public function getAward(): ?string
    {
        return $this->award;
    }

    public function setDissolutionDate(?\DateTimeInterface $dissolutionDate): void
    {
        $this->dissolutionDate = $dissolutionDate;
    }

    public function getDissolutionDate(): ?\DateTimeInterface
    {
        return $this->dissolutionDate;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmployee(?Person $employee): void
    {
        $this->employee = $employee;
    }

    public function getEmployee(): ?Person
    {
        return $this->employee;
    }

    public function setFounder(?Person $founder): void
    {
        $this->founder = $founder;
    }

    public function getFounder(): ?Person
    {
        return $this->founder;
    }

    public function setFoundingDate(?\DateTimeInterface $foundingDate): void
    {
        $this->foundingDate = $foundingDate;
    }

    public function getFoundingDate(): ?\DateTimeInterface
    {
        return $this->foundingDate;
    }

    public function setGlobalLocationNumber(?string $globalLocationNumber): void
    {
        $this->globalLocationNumber = $globalLocationNumber;
    }

    public function getGlobalLocationNumber(): ?string
    {
        return $this->globalLocationNumber;
    }

    public function setKnowsLanguage(Language $knowsLanguage): void
    {
        $this->knowsLanguage = $knowsLanguage;
    }

    public function getKnowsLanguage(): Language
    {
        return $this->knowsLanguage;
    }

    public function setKnowsAbout(Thing $knowsAbout): void
    {
        $this->knowsAbout = $knowsAbout;
    }

    public function getKnowsAbout(): Thing
    {
        return $this->knowsAbout;
    }

    public function setLocation(?Place $location): void
    {
        $this->location = $location;
    }

    public function getLocation(): ?Place
    {
        return $this->location;
    }

    public function setMember(?Person $member): void
    {
        $this->member = $member;
    }

    public function getMember(): ?Person
    {
        return $this->member;
    }

    public function addNaic(string $naic): void
    {
        $this->naics[] = $naic;
    }

    public function removeNaic(string $naic): void
    {
        $this->naics->removeElement($naic);
    }

    public function getNaics(): Collection
    {
        return $this->naics;
    }

    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setLegalName(?string $legalName): void
    {
        $this->legalName = $legalName;
    }

    public function getLegalName(): ?string
    {
        return $this->legalName;
    }

    public function setLeiCode(?string $leiCode): void
    {
        $this->leiCode = $leiCode;
    }

    public function getLeiCode(): ?string
    {
        return $this->leiCode;
    }

    public function addIsicV4(string $isicV4): void
    {
        $this->isicV4s[] = $isicV4;
    }

    public function removeIsicV4(string $isicV4): void
    {
        $this->isicV4s->removeElement($isicV4);
    }

    public function getIsicV4s(): Collection
    {
        return $this->isicV4s;
    }

    public function setVatID(?string $vatID): void
    {
        $this->vatID = $vatID;
    }

    public function getVatID(): ?string
    {
        return $this->vatID;
    }

    public function setDun(?string $dun): void
    {
        $this->dun = $dun;
    }

    public function getDun(): ?string
    {
        return $this->dun;
    }
}
