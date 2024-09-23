<?php

namespace App\Services;

use Sabre\VObject\Reader;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IcalService
{
  public function fetchIcalData($icalUrl)
  {
    $icalContent = file_get_contents($icalUrl);

    if (!$icalContent) {
      return [];
    }

    // Sabre VObjectを使ってicalファイルを解析
    $vcalendar = Reader::read($icalContent);

    $reservations = [];

    // イベント（予約済みのデータ）を抽出
    foreach ($vcalendar->VEVENT as $event) {
      $startDate = Carbon::parse($event->DTSTART->getValue())->format('Y-m-d');
      $endDate = Carbon::parse($event->DTEND->getValue())->format('Y-m-d');

      // 予約の期間を配列に保存（1日ごとに追加）
      $period = Carbon::parse($startDate)->toPeriod($endDate, '1 day');
      foreach ($period as $date) {
        $reservations[] = $date->format('Y-m-d');
      }
    }

    return $reservations;
  }

  public function saveReservationsToDatabase($airbnbReservations, $vacationStayReservations)
  {
    $mergedReservations = array_unique(array_merge($airbnbReservations, $vacationStayReservations));

    DB::table('reservations')->truncate();

    foreach ($mergedReservations as $date) {
      DB::table('reservations')->insert([
        'date' => $date,
        'status' => 'booked',
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
    return $mergedReservations;
  }
}
