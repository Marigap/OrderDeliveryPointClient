<?php

use App\Http\Controllers\OrderDeliveriesController;
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


Route::middleware(['web'])->group(function() {
    Route::get('/add-delivery', function () {
        return view('add-delivery');
    });

    Route::get('/modify-delivery', function () {
        return view('modify-delivery');
    });
});



