<?php

declare(strict_types=1);

namespace App\Enum;

use ApiPlatform\Core\Annotation\ApiResource;
use MyCLabs\Enum\Enum;

/**
 * The day of the week, e.g. used to specify to which day the opening hours of an OpeningHoursSpecification refer.
 *
 * Originally, URLs from [GoodRelations](http://purl.org/goodrelations/v1) were used (for [Monday](http://schema.org/Monday), [Tuesday](http://schema.org/Tuesday), [Wednesday](http://schema.org/Wednesday), [Thursday](http://schema.org/Thursday), [Friday](http://schema.org/Friday), [Saturday](http://schema.org/Saturday), [Sunday](http://schema.org/Sunday) plus a special entry for [PublicHolidays](http://schema.org/PublicHolidays)); these have now been integrated directly into schema.org.
 *
 * @see http://schema.org/DayOfWeek Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 * @ApiResource(iri="http://schema.org/DayOfWeek")
 */
class DayOfWeek extends Enum
{
    public const ORDER = [
        self::MONDAY => 1,
        self::TUESDAY => 2,
        self::WEDNESDAY => 3,
        self::THURSDAY => 4,
        self::FRIDAY => 5,
        self::SATURDAY => 6,
        self::SUNDAY => 7,
        ];
    /**
     * @var string the day of the week between Thursday and Saturday
     */
    public const FRIDAY = 'Friday';

    /**
     * @var string the day of the week between Sunday and Tuesday
     */
    public const MONDAY = 'Monday';

    /**
     * @var string the day of the week between Tuesday and Thursday
     */
    public const WEDNESDAY = 'Wednesday';

    /**
     * @var string the day of the week between Wednesday and Friday
     */
    public const THURSDAY = 'Thursday';

    /**
     * @var string the day of the week between Monday and Wednesday
     */
    public const TUESDAY = 'Tuesday';

    /**
     * @var string the day of the week between Friday and Sunday
     */
    public const SATURDAY = 'Saturday';

    /**
     * @var string This stands for any day that is a public holiday; it is a placeholder for all official public holidays in some particular location. While not technically a "day of the week", it can be used with \[\[OpeningHoursSpecification\]\]. In the context of an opening hours specification it can be used to indicate opening hours on public holidays, overriding general opening hours for the day of the week on which a public holiday occurs.
     */
    public const PUBLIC_HOLIDAYS = 'PublicHolidays';

    /**
     * @var string the day of the week between Saturday and Monday
     */
    public const SUNDAY = 'Sunday';
}
