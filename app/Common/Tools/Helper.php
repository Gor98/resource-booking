<?php

use App\Common\Tools\Setting;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Str;

/**
 * @param Carbon $date
 * @param string $format
 * @return string
 */
function format(Carbon $date, string $format = Setting::DATE_TIME_FORMAT)
{
    return $date->format($format);
}
