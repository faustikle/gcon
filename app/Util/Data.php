<?php

namespace App\Util;

use IntlDateFormatter;
use DateTimeInterface;
use DateTime;

final class Data
{
    /**
     * @return string
     */
    public static function mesAtual(): string
    {
        $formatter = new IntlDateFormatter(config('app.locale'), IntlDateFormatter::SHORT, IntlDateFormatter::SHORT);
        $formatter->setPattern('LLLL');

        return studly_case($formatter->format(new DateTime()));
    }

    /**
     * @param string $formato
     * @param DateTimeInterface $data
     * @return string
     */
    public static function format(string $formato, DateTimeInterface $data): string
    {
        $formatter = new IntlDateFormatter(config('app.locale'), IntlDateFormatter::SHORT, IntlDateFormatter::SHORT);
        $formatter->setPattern($formato);

        return studly_case($formatter->format($data));
    }
}
