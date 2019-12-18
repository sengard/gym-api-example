<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * The most generic type of item.
 *
 * @see http://schema.org/PhysicalActivity Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/PhysicalActivity")
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $language;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $typeOfExercise;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $muscleType;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $additionalMuscleType;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $additionalMuscleType2;

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

    public function setTypeOfExercise(?string $typeOfExercise): void
    {
        $this->typeOfExercise = $typeOfExercise;
    }

    public function getTypeOfExercise(): ?string
    {
        return $this->typeOfExercise;
    }

    public function setMuscleType(?string $muscleType): void
    {
        $this->muscleType = $muscleType;
    }

    public function getMuscleType(): ?string
    {
        return $this->muscleType;
    }

    public function setAdditionalMuscleType(?string $additionalMuscleType): void
    {
        $this->additionalMuscleType = $additionalMuscleType;
    }

    public function getAdditionalMuscleType(): ?string
    {
        return $this->additionalMuscleType;
    }

    public function setAdditionalMuscleType2(?string $additionalMuscleType2): void
    {
        $this->additionalMuscleType2 = $additionalMuscleType2;
    }

    public function getAdditionalMuscleType2(): ?string
    {
        return $this->additionalMuscleType2;
    }
}
