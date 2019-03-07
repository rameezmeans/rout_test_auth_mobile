<?php

namespace App\Http\Controllers;

use App\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;


class FrontEndController extends Controller
{
    public function welcome()
    {

        $first_date_entry = Settings::where('key' ,'=', 'first_hit_date')->get();

        if (sizeof( $first_date_entry ) == 0 ){

            $today = Carbon::today()->toDateString();

            $first_hit_date = new Settings();
            $first_hit_date->key = 'first_hit_date';
            $first_hit_date->value = $today;
            $first_hit_date->save();
        }

        //task 3 --- i am checking Agent by using Jenssegers.

        $agent = new Agent();

        if ($agent->isMobile()) {

            return view('welcome_mobile');

        }
        else{

            return view('welcome');

        }

    }

    public function contact_us(){
        return view('contact_us');


    }
    public function about_us()
    {
        return view('about');

    }
}
