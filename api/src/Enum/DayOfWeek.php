<?php

declare(strict_types=1);

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * The day of the week, e.g. used to specify to which day the opening hours of an OpeningHoursSpecification refer.
 *
 * Originally, URLs from [GoodRelations](http://purl.org/goodrelations/v1) were used (for [Monday](http://schema.org/Monday), [Tuesday](http://schema.org/Tuesday), [Wednesday](http://schema.org/Wednesday), [Thursday](http://schema.org/Thursday), [Friday](http://schema.org/Friday), [Saturday](http://schema.org/Saturday), [Sunday](http://schema.org/Sunday) plus a special entry for [PublicHolidays](http://schema.org/PublicHolidays)); these have now been integrated directly into schema.org.
 *
 * @see http://schema.org/DayOfWeek Documentation on Schema.org
 *
 * @author Maxim Yalagin <yalagin@gmail.com>
 */
class DayOfWeek extends Enum
{
    /**
     * @var string the day of the week between Thursday and Saturday
     */
    public const FRIDAY = 'http://schema.org/Friday';

    /**
     * @var string the day of the week between Sunday and Tuesday
     */
    public const MONDAY = 'http://schema.org/Monday';

    /**
     * @var string the day of the week between Tuesday and Thursday
     */
    public const WEDNESDAY = 'http://schema.org/Wednesday';

    /**
     * @var string the day of the week between Wednesday and Friday
     */
    public const THURSDAY = 'http://schema.org/Thursday';

    /**
     * @var string the day of the week between Monday and Wednesday
     */
    public const TUESDAY = 'http://schema.org/Tuesday';

    /**
     * @var string the day of the week between Friday and Sunday
     */
    public const SATURDAY = 'http://schema.org/Saturday';

    /**
     * @var string This stands for any day that is a public holiday; it is a placeholder for all official public holidays in some particular location. While not technically a "day of the week", it can be used with \[\[OpeningHoursSpecification\]\]. In the context of an opening hours specification it can be used to indicate opening hours on public holidays, overriding general opening hours for the day of the week on which a public holiday occurs.
     */
    public const PUBLIC_HOLIDAYS = 'http://schema.org/PublicHolidays';

    /**
     * @var string the day of the week between Saturday and Monday
     */
    public const SUNDAY = 'http://schema.org/Sunday';
}
