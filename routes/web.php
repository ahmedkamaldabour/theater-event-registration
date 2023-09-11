<?php

use App\Http\Controllers\EventDayController;
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
