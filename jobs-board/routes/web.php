<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobApplicationContorller;
use App\Http\Controllers\MyJobController;
use App\Http\Middleware\Employer;
use Illuminate\Support\Facades\Route;


Route::get('/', fn() => to_route('jobs.index'));
Route::resource('jobs', JobController::class)
    ->only('index', 'show');

Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)
    ->only('create', 'store');

Route::delete('logout', fn() => to_route('auth.destory'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');


Route::middleware('auth')->group(function(){
    Route::resource('job.application', JobApplicationController::class)
        ->only(['create', 'store']);

    Route::resource('my-job-application', MyJobApplicationContorller::class)
        ->only(['index', 'destroy']);

    Route::resource('employers', EmployerController::class)
        ->only(['create', 'store']);

    Route::middleware(Employer::class)
        ->resource('my-jobs', MyJobController::class);
});


// Route::get('/test', function(){
//     $jobs = \App\Models\Job::query();
//     $jobs = $jobs->with('employer')->get();

//     return $jobs;
// });