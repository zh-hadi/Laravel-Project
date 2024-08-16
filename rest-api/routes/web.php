<?php

use App\Http\Controllers\ProductController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    
    $events = Event::all();
    $ev = $events->random(rand(1, 5));

    return $ev;
});

