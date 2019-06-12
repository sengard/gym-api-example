<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Any part of the human body, typically a component of an anatomical system. Organs, tissues, and cells are all anatomical structures.
 *
 * @see http://schema.org/AnatomicalStructure Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/AnatomicalStructure")
 */
class AnatomicalStructure extends AbstractThing
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
     * @var Collection<ExercisePlan>|null
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\ExercisePlan")
     */
    private $ExercisePlans;

    public function __construct()
    {
        $this->ExercisePlans = new ArrayCollection();
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function addExercisePlan(ExercisePlan $ExercisePlan): void
    {
        $this->ExercisePlans[] = $ExercisePlan;
    }

    public function removeExercisePlan(ExercisePlan $ExercisePlan): void
    {
        $this->ExercisePlans->removeElement($ExercisePlan);
    }

    public function getExercisePlans(): Collection
    {
        return $this->ExercisePlans;
    }
}
