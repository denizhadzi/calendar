<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\calendarAppController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::get('/', [calendarAppController::class,'index']);

route::get('/events/list', [calendarAppController::class,'showEvents']);

route::get('/events', [calendarAppController::class,'eventsPage']);
route::get('/events/list', [calendarAppController::class,'showEvents']);

Route::get('/auth/google', [calendarAppController::class,'checkGoogle']);
Route::get('/auth/google/callback', [calendarAppController::class,'googleCallback']);
Route::get('/getEvents',[calendarAppController::class,'getEvents']);
