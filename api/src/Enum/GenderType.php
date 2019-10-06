<?php

declare(strict_types=1);

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * An enumeration of genders.
 *
 * @see http://schema.org/GenderType Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 * @ApiResource(iri="http://schema.org/GenderType")
 */
class GenderType extends Enum
{
    /**
     * @var string the male gender
     */
    public const MALE = 'http://schema.org/Male';

    /**
     * @var string the female gender
     */
    public const FEMALE = 'http://schema.org/Female';

    /**
     * @var string|null the name of the item
     *
     * @ORM\Column(type="text",nullable=true)
     * @ApiProperty(iri="http://schema.org/name")
     */
    private $name;

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
