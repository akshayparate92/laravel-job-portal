<?php

use App\Http\Controllers\Authenticate;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() =>to_route('jobs.index'));
Route::resource('/jobs', JobController::class)->only(['index','show']);
Route::resource('/auth', Authenticate::class)->only(['create','store']);
Route::delete('/auth',[Authenticate::class, 'destroy'])->name('auth.destroy');
