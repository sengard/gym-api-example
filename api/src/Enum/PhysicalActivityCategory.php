<?php

declare(strict_types=1);

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * Categories of physical activity, organized by physiologic classification.
 *
 * @see http://schema.org/PhysicalActivityCategory Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 * @ApiResource(iri="http://schema.org/PhysicalActivityCategory")
 */
class PhysicalActivityCategory extends Enum
{
    /**
     * @var string physical activity that is engaged to help maintain posture and balance
     */
    public const BALANCE = 'http://schema.org/Balance';

    /**
     * @var string physical activity that is of high-intensity which utilizes the anaerobic metabolism of the body
     */
    public const ANAEROBIC_ACTIVITY = 'http://schema.org/AnaerobicActivity';

    /**
     * @var string Physical activity that is engaged in to improve muscle and bone strength. Also referred to as resistance training.
     */
    public const STRENGTH_TRAINING = 'http://schema.org/StrengthTraining';

    /**
     * @var string physical activity of relatively low intensity that depends primarily on the aerobic energy-generating process; during activity, the aerobic metabolism uses oxygen to adequately meet energy demands during exercise
     */
    public const AEROBIC_ACTIVITY = 'http://schema.org/AerobicActivity';

    /**
     * @var string Any physical activity engaged in for job-related purposes. Examples may include waiting tables, maid service, carrying a mailbag, picking fruits or vegetables, construction work, etc.
     */
    public const OCCUPATIONAL_ACTIVITY = 'http://schema.org/OccupationalActivity';

    /**
     * @var string Any physical activity engaged in for recreational purposes. Examples may include ballroom dancing, roller skating, canoeing, fishing, etc.
     */
    public const LEISURE_TIME_ACTIVITY = 'http://schema.org/LeisureTimeActivity';

    /**
     * @var string physical activity that is engaged in to improve joint and muscle flexibility
     */
    public const FLEXIBILITY = 'http://schema.org/Flexibility';

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
