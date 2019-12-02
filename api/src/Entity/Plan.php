<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Serializer\Filter\GroupFilter;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/exercisePlan Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/exercisePlan", normalizationContext={"groups"={"plan","thing"}})
 * @ApiFilter(GroupFilter::class, arguments={"parameterName": "groups", "overrideDefaultGroups": false, "whitelist": {"withWorkouts"}})
 */
class Plan extends AbstractHasUser
{
    /**
     * @var string
     *
     * @Groups({"plan"})
     * @ORM\Id
     * @ORM\Column(type="guid")
     * @Assert\Uuid
     */
    private $id;

    /**
     * @var Collection<Workout>|null
     * @Groups({"withWorkouts"})
     * @ApiProperty(push=true)
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Workout", mappedBy="plan")
     * @ORM\JoinTable(inverseJoinColumns={@ORM\JoinColumn(unique=true)})
     */
    private $workouts;

    /**
     * @var bool|null
     *
     * @Groups({"plan"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isCurrent = true;

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

    public function addWorkout(Workout $workout): void
    {
        $this->workouts[] = $workout;
    }

    public function removeWorkout(Workout $workout): void
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
