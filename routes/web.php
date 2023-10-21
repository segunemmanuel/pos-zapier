<?php

use App\Http\Controllers\ZapierController;
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
    return view('welcome');
});

Route::get('/pdf', function () {
    return view('pdf');
});


// Route::get('/download-pdf/{filename}', 'ZapierController@downloadPdf')

Route::get('/download-pdf/{filename}',[ZapierController::class, 'downloadPdf'])->name('download-pdf');
