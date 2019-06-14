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
class ExerciseFromUser extends AbstractThing
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
     * @var Person
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Person")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotNull
     */
    private $owned;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     * @Assert\NotNull
     */
    private $isPublic;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Assert\NotNull
     */
    private $language;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setOwned(Person $owned): void
    {
        $this->owned = $owned;
    }

    public function getOwned(): Person
    {
        return $this->owned;
    }

    public function setIsPublic(bool $isPublic): void
    {
        $this->isPublic = $isPublic;
    }

    public function getIsPublic(): bool
    {
        return $this->isPublic;
    }

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }
}
