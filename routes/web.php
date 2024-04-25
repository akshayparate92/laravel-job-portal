<?php

use App\Http\Controllers\Authenticate;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() =>to_route('jobs.index'));
Route::resource('/jobs', JobController::class)->only(['index','show']);
Route::resource('/auth', Authenticate::class)->only(['create','store']);
Route::delete('/auth',[Authenticate::class, 'destroy'])->name('auth.destroy');
Route::middleware('auth')->group(function(){
    Route::resource('job.application',JobApplicationController::class)->only(['create','store']);
    Route::resource('my-job-applications', MyApplicationController::class)->only(['index','destroy']);
});
