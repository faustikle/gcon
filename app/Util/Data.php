<?php

namespace App\Util;

use IntlDateFormatter;
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
}
