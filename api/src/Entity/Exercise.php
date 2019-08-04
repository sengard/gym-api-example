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
class Exercise extends AbstractHasUser
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
     * @var string|null
     *
     * @ORM\Column(type="text",nullable=true)
     */
    private $language;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer",nullable=true)
     */
    private $betweenSetsRestPeriod;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer",nullable=true)
     */
    private $afterExerciseRestPeriod;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text",nullable=true)
     */
    private $typeOfExercise;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text",nullable=true)
     */
    private $musculeTypee;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setBetweenSetsRestPeriod(?int $betweenSetsRestPeriod): void
    {
        $this->betweenSetsRestPeriod = $betweenSetsRestPeriod;
    }

    public function getBetweenSetsRestPeriod(): ?int
    {
        return $this->betweenSetsRestPeriod;
    }

    public function setAfterExerciseRestPeriod(?int $afterExerciseRestPeriod): void
    {
        $this->afterExerciseRestPeriod = $afterExerciseRestPeriod;
    }

    public function getAfterExerciseRestPeriod(): ?int
    {
        return $this->afterExerciseRestPeriod;
    }

    public function setTypeOfExercise(?string $typeOfExercise): void
    {
        $this->typeOfExercise = $typeOfExercise;
    }

    public function getTypeOfExercise(): ?string
    {
        return $this->typeOfExercise;
    }

    public function setMusculeTypee(?string $musculeTypee): void
    {
        $this->musculeTypee = $musculeTypee;
    }

    public function getMusculeTypee(): ?string
    {
        return $this->musculeTypee;
    }
}
