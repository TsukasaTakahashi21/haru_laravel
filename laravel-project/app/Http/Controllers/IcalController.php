<?php

namespace App\Http\Controllers;

use App\Services\IcalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IcalController extends Controller
{
    protected $icalService;

    public function __construct(IcalService $icalService)
    {
        $this->icalService = $icalService;
    }

    public function updateReservations()
    {
        try {
            $airbnbReservations = $this->icalService->fetchIcalData('https://www.airbnb.com/calendar/ical/621103954521198794.ics?s=ba65365a8b8f49af5a006a240769d5bc&locale=ja');
            $vacationStayReservations = $this->icalService->fetchIcalData('https://ical.vacation-stay.jp/ical/v1/room_groups/266521.ics?s=f98ff2ce8460fc286bc22c86e776e184');

            $mergedReservations = $this->icalService->saveReservationsToDatabase($airbnbReservations, $vacationStayReservations);

            $startDate = now();
            $endDate = now()->addMonth(2)->endOfMonth();
            $allDates = $this->generateDateRange($startDate, $endDate);

            $bookedDates = collect($mergedReservations)->pluck('date')->toArray();
            $availableDates = array_diff($allDates, $bookedDates);

            DB::transaction(function () use ($mergedReservations, $availableDates) {
                DB::table('calendar_status')->truncate();

                $this->insertDates($mergedReservations, 'booked');
                $this->insertDates($availableDates, 'available');
            });

            return response()->json(['message' => '予約の更新が完了しました。']);
        } catch (\Exception $e) {
            Log::error('予約の更新中にエラーが発生しました: ' . $e->getMessage());
            return response()->json(['message' => '予約の更新中にエラーが発生しました。'], 500);
        }
    }

    protected function generateDateRange($startDate, $endDate)
    {
        $dates = [];
        $currentDate = $startDate->copy();
        while ($currentDate->lte($endDate)) {
            $dates[] = $currentDate->toDateString();
            $currentDate->addDay();
        }
        return $dates;
    }

    protected function insertDates(array $dates, string $status)
    {
        foreach ($dates as $date) {
            DB::table('calendar_status')->insert([
                'date' => $date,
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function getCalendarData()
    {
        $startDate = now();
        $endDate = now()->addMonth(2)->endOfMonth();
        $allDates = $this->generateDateRange($startDate, $endDate);

        $bookedDates = DB::table('calendar_status')->pluck('date')->toArray();

        $events = [];
        foreach ($allDates as $date) {
            if (!in_array($date, $bookedDates)) {
                $events[] = [
                    'title' => '○',
                    'start' => $date,
                    'color' => 'green',
                    'clickable' => true,
                ];
            }
        }

        return response()->json($events);
    }

    public function showReservationPage(Request $request)
    {
        $selectedDate = $request->query('date');
        return view('reservation', ['date' => $selectedDate]);
    }
}
