<?php

declare(strict_types=1);

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * An enumeration of genders.
 *
 * @see http://schema.org/GenderType Documentation on Schema.org
 */
class GenderType extends Enum
{
    /**
     * @var string the female gender
     */
    const FEMALE = 'http://schema.org/Female';

    /**
     * @var string the male gender
     */
    const MALE = 'http://schema.org/Male';
}
