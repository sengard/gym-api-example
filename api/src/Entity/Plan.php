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
class Plan extends AbstractHasUser
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
     * @var Collection<Workouts>|null
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Workouts", mappedBy="plan")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     */
    private $workouts;

    /**
     * @var bool|null
     *
     * @ORM\Column(type="boolean",nullable=true)
     */
    private $isCurrent;

    public function __construct()
    {
        $this->workouts = new ArrayCollection();
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

    public function addWorkout(Workouts $workout): void
    {
        $this->workouts[] = $workout;
    }

    public function removeWorkout(Workouts $workout): void
    {
        $this->workouts->removeElement($workout);
    }

    public function getWorkouts(): Collection
    {
        return $this->workouts;
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
