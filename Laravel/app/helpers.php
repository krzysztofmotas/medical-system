<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\App;

function formatTimestampToDate($timestamp)
{
    $date = Carbon::parse($timestamp);

    Carbon::setLocale('pl');
    setlocale(LC_TIME, 'pl_PL.UTF-8');

    $formattedDate = $date->translatedFormat('j F Y, H:i');

    return $formattedDate;
}
