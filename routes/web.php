<?php

use App\Http\Controllers\ArsipController;
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




Route::middleware(['web'])->group(function () {

    Route::get('/', function (){
        return redirect()->route('arsipsurat.index');
    });

    Route::resource('arsipsurat', ArsipController::class)->except('destroy');
    Route::get('arsipsurat/delete/{id}',[ArsipController::class, 'destroy'])->name('arsipsurat.destroy');

    Route::get('/about', function () {
        return view('layouts.about');
    });
});
