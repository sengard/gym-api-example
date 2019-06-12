<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Natural languages such as Spanish, Tamil, Hindi, English, etc. Formal language code tags expressed in [BCP 47](https://en.wikipedia.org/wiki/IETF_language_tag) can be used via the [alternateName](http://schema.org/alternateName) property. The Language type previously also covered programming languages such as Scheme and Lisp, which are now best represented using [ComputerLanguage](http://schema.org/ComputerLanguage).
 *
 * @see http://schema.org/Language Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 *
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/Language")
 */
class Language
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
     * @var string|null the name of the item
     *
     * @ORM\Column(type="text", nullable=true)
     * @ApiProperty(iri="http://schema.org/name")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(length=2)
     * @Assert\NotNull
     */
    private $alpha2;

    /**
     * @var string
     *
     * @ORM\Column(length=3)
     * @Assert\NotNull
     */
    private $alpha3;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setAlpha2(string $alpha2): void
    {
        $this->alpha2 = $alpha2;
    }

    public function getAlpha2(): string
    {
        return $this->alpha2;
    }

    public function setAlpha3(string $alpha3): void
    {
        $this->alpha3 = $alpha3;
    }

    public function getAlpha3(): string
    {
        return $this->alpha3;
    }
}
