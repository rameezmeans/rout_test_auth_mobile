<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//task two

Route::get('linkedin', function () {
    return view('loginlinkedin');
});

//task one
Route::get('/', 'FrontEndController@welcome');

    $first_hit_date = \App\Settings::where('key', '=', 'first_hit_date')->first()->value;

    $cDate = \Carbon\Carbon::parse($first_hit_date);
    $difference_in_days = $cDate->diffInDays();

    if($difference_in_days < 7){

        Route::get('/about-us', 'FrontEndController@about_us');
    }
    else{

        Route::get('/about-us-together', 'FrontEndController@about_us');
        Route::get('/about-us/contact-us', 'FrontEndController@contact_us');

    }

Auth::routes();

Route::get('/redirect', 'SocialAuthLinkedinController@redirect');
Route::get('/callback', 'SocialAuthLinkedinController@callback');

Route::get('/home', 'HomeController@index')->name('home');
