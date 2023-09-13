<?php

use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\EventDayController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ShowTimeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('showtime-data/{date}', [ShowTimeController::class, 'showTimeForSelectedData'])
    ->name('showTimeForSelectedData');

Route::group(
    [
        'prefix' => 'resister',
        'as' => 'resister.',
        'controller' => AttendeeController::class
    ],
    function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{attendee}/edit', 'edit')->name('edit');
        Route::put('/{attendee}', 'update')->name('update');
        Route::delete('/{attendee}', 'destroy')->name('destroy');
    }
);
Route::group(
    [
        'prefix' => 'event-days',
        'as' => 'event-days.',
        'controller' => EventDayController::class
    ],
    function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{event_day}/edit', 'edit')->name('edit');
        Route::put('/{event_day}', 'update')->name('update');
        Route::delete('/{event_day}', 'destroy')->name('destroy');
    }
);
Route::group(
    [
        'prefix' => 'movies',
        'as' => 'movies.',
        'controller' => MovieController::class
    ],
    function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{movie}/edit', 'edit')->name('edit');
        Route::put('/{movie}', 'update')->name('update');
        Route::delete('/{movie}', 'destroy')->name('destroy');
    }
);
Route::group(
    [
        'prefix' => 'dates',
        'as' => 'dates.',
        'controller' => DateController::class
    ],
    function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{date}/edit', 'edit')->name('edit');
        Route::put('/{date}', 'update')->name('update');
        Route::delete('/{date}', 'destroy')->name('destroy');
    }
);
 Route::group(
    [
        'prefix' => 'showTimes',
        'as' => 'showTimes.',
        'controller' => ShowTimeController::class
    ],
    function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{showTime}/edit', 'edit')->name('edit');
        Route::put('/{showTime}', 'update')->name('update');
        Route::delete('/{showTime}', 'destroy')->name('destroy');
    }
);
