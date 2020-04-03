<?php

namespace App\Http\Controllers;

use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Illuminate\Http\Request;

class gCalendarController extends Controller
{
    public function index(){
        $event = new Event;
        $event->name = 'A new full day event';
        $event->startDate = Carbon::now();
        $event->endDate = Carbon::now()->addDay();
        $event->save();
        $events = Event::get();
        dd($events);
    }
}
