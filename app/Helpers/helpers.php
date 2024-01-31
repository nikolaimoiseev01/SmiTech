<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
function date_ru_format($inputDateTime)
{
    setlocale(LC_ALL, 'ru_RU.utf8');
    Carbon::setLocale('ru');

    $currentDateTime = new DateTime();
    $inputDate = new DateTime($inputDateTime);
    $diff = $currentDateTime->diff($inputDate);
    $formattedDateTime = $inputDate->format('d F H:i');

    if ($diff->days == 1 && $currentDateTime > $inputDate) {
        return 'Вчера ' . $inputDate->format('H:i');
    } elseif ($diff->days == 0) {
        return 'Сегодня ' . $inputDate->format('H:i');
    } elseif ($diff->days == -1 && $currentDateTime < $inputDate) {
        return 'завтра ' . $inputDate->format('H:i');
    } else {
//        dd($currentDateTime, $inputDate);
        return Carbon::parse($inputDate)->translatedFormat('d M y H:i') ;
    }
}
