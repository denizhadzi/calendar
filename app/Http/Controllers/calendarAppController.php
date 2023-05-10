<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\events;
use Google_Client;
use Google\Service\Calendar as ServiceCalendar;



class calendarAppController extends Controller
{
    public function checkGoogle()
    {
        $client = new Google_Client();
        $client->setAuthConfig("C:\Users\Deniz\google_credentials.json");
        $client->addScope(ServiceCalendar::CALENDAR_READONLY);
        $client->setRedirectUri(url('/auth/google/callback'));

        return redirect($client->createAuthUrl());
    }

    public function googleCallback(Request $request)
    {
        $client = new Google_Client();
        $client->setAuthConfig("C:\Users\Deniz\google_credentials.json");
        $client->addScope(ServiceCalendar::CALENDAR_READONLY);
        $client->setRedirectUri(url('/auth/google/callback'));

        if ($request->has('code')) {
            $client->fetchAccessTokenWithAuthCode($request->input('code'));
            $request->session()->put('access_token', $client->getAccessToken());
        }

        return redirect('/getEvents');
    }

    public function getEvents(Request $request)
    {
        $client = new Google_Client();
        $client->setAuthConfig("C:\Users\Deniz\google_credentials.json");
        $client->addScope(ServiceCalendar::CALENDAR_READONLY);
        $client->setRedirectUri(url('/auth/google/callback'));
    
        if ($request->session()->has('access_token')) {
            $client->setAccessToken($request->session()->get('access_token'));
    
            $service = new ServiceCalendar($client);
            $calendarId = 'primary';
            $optParams = array( 
                'orderBy' => 'startTime',
                'singleEvents' => true,
                'timeMin' => date('c'),
            );
            $results = $service->events->listEvents($calendarId, $optParams);
            $eventList = array();

            foreach ($results->getItems() as $event) {
                $eventList =[
                    'title' => $event->getSummary(),
                    'description' => $event->getDescription(),
                    "start_date" => date('Y-m-d H:i:s', strtotime($event->getStart()->getDateTime())),
                ];

                DB::table('events')->updateOrInsert(['id' => $event->getId()], $eventList);
            }

            return redirect("/events");
        }
            
         else {
            return redirect('/auth/google');
        }
    }

    public function showEvents() {


        return events::all();
    }

    public function eventsPage() {

        return view('events');
    }

    public function index() {
        return view('welcome', ['eventList' => events::all()]);
    }
}
    

    



