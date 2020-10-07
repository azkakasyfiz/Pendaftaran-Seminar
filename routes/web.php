<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'privill'], function (){
   Auth::routes(
//       ['register'=> false] // buat disable register
   );
});

Route::get('/', 'WebinarsController@index');
Route::get('/detail/{webinar}', 'WebinarsController@detail' );
Route::get('/detail/{webinar}/join', 'WebinarsController@show' );
Route::get('/success', 'UserController@success' );
Route::get('/adminlogin', 'AdminController@adminlogin')->name('adminlogin');

Route::get('/admindashboard/adminsendcertificate/{participant}', 'ParticipantsController@show1' );

Route::get('/welcome', 'UserController@welcome' );

Route::get('/admindashboard', 'ParticipantsController@index')->middleware('auth');;
Route::get('/adminparticipant', 'ParticipantsController@indexparticipant')->middleware('auth');;
Route::get('/admindashboard/search', 'ParticipantsController@search')->middleware('auth');;
Route::post('/participant/store', 'ParticipantsController@store');
Route::get('/admindashboard/inputwebinar', 'WebinarsController@input' )->middleware('auth');;
Route::post('/webinar/store', 'WebinarsController@store');

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/send-mail',function(){
    $details = [
        'title'=>'Mail from Perndaftaran Webinar',
        'body'=>'This is email testing using google SMTP'
    ];
    \Mail::to('aplikasiwebinar@gmail.com')->send(new App\Mail\MagangEmail($details));
    echo "Email has been sent!";
});

Route::get('/admindashboard/adminsendlink/webinar', 'ParticipantsController@sendByWebinar')->middleware('auth');;

Route::get('/admindashboard/adminsendlink/{participant}','ParticipantsController@show')->middleware('auth');;
Route::post('/admindashboard/adminsendlink/{participant}/sendlink','SendMailController@send')->middleware('auth');;

Route::get('/admindashboard/adminsendcertificate/{participant}','ParticipantsController@show1')->middleware('auth');;
Route::post('/admindashboard/adminsendcertificate/{participant}/sendcertificate','SendMailController@send1')->middleware('auth');;

Route::get('/admindashboard/adminsendlinktoall', 'ParticipantsController@sendtoAll')->middleware('auth');;
Route::post('/admindashboard/adminsendlinktoall', 'SendMailController@sendtoAll')->middleware('auth');;
