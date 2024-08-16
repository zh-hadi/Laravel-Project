<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');


// Route::resource('events', EventController::class)
//     ->except('create', 'edit');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events', [EventController::class, 'store'])->name('events.store')->middleware('auth:sanctum');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update')->middleware('auth:sanctum');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy')->middleware('auth:sanctum');


Route::resource("events.attendees", AttendeeController::class)
    ->except('create', 'edit');


Route::get("/test", function(){
    $events = \App\Models\Event::with(['attendees.user', 'attendees.event'])->get();
    return $events;
});