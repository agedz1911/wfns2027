<?php

namespace App\Support;

class CVFacultyForm
{
    public const MAX_ENTRIES = 5;

    public static function countries(): array
    {
        return collect(countries(true))
            ->pluck('name.common')
            ->sort(SORT_NATURAL | SORT_FLAG_CASE)
            ->values()
            ->all();
    }

    public static function countryOptions(): array
    {
        $countries = self::countries();

        return array_combine($countries, $countries);
    }
}
