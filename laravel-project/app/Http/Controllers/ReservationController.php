<?php
namespace App\Http\Controllers;

use ICal\ICal;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
    public function showReservationForm()
    {
        // Airbnbのカレンダー
        $airbnbIcal = new ICal('https://www.airbnb.com/calendar/ical/621103954521198794.ics?s=ba65365a8b8f49af5a006a240769d5bc&locale=ja');
        $airbnbEvents = $airbnbIcal->events();

        $vacationStayIcal = new Ical('https://ical.vacation-stay.jp/ical/v1/room_groups/266521.ics?s=f98ff2ce8460fc286bc22c86e776e184');
        $vacationStayEvents = $vacationStayIcal->events();


        $formattedAirbnbEvents = array_map(function ($event) {
            return [
                'title' => $event->summary ?: '予約',
                'start' => date('Y-m-d', strtotime($event->dtstart)),
                'end' => date('Y-m-d', strtotime($event->dtend)),
                'color' => 'blue' 
            ];
        }, $airbnbEvents);

        $formattedVacationStayEvents = array_map(function ($event) {
            return [
                'title' => $event->summary ?: 'VacationSTAY予約',
                'start' => date('Y-m-d', strtotime($event->dtstart)),
                'end' => date('Y-m-d', strtotime($event->dtend)),
                'color' => 'green'  
            ];
        }, $vacationStayEvents);

        $allEvents = array_merge($formattedAirbnbEvents, $formattedVacationStayEvents);

        return view('reservation', ['events' => $allEvents]);
    }
}
