<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
class Plan extends AbstractThing
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Person", inversedBy="plans")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owned;

    /**
     * @var Collection<Days>|null
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Days", mappedBy="plan")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     */
    private $days;

    /**
     * @var bool|null
     *
     * @ORM\Column(type="boolean",nullable=true)
     */
    private $isCurrent;

    public function __construct()
    {
        $this->days = new ArrayCollection();
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setOwned(?Person $owned): void
    {
        $this->owned = $owned;
    }

    public function getOwned(): ?Person
    {
        return $this->owned;
    }

    public function addDay(Days $day): void
    {
        $this->days[] = $day;
    }

    public function removeDay(Days $day): void
    {
        $this->days->removeElement($day);
    }

    public function getDays(): Collection
    {
        return $this->days;
    }

    public function setIsCurrent(?bool $isCurrent): void
    {
        $this->isCurrent = $isCurrent;
    }

    public function getIsCurrent(): ?bool
    {
        return $this->isCurrent;
    }
}
