<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasicControlController;
use App\Http\Controllers\EmailControlController;
use App\Http\Controllers\EmailTemplateController;
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

Route::get('/', function () {
    return view('file');
})->name('file.index');


Route::get('/basic-control', [BasicControlController::class, 'index'])->name('basicControl.index');
Route::post('/basic-control', [BasicControlController::class, 'store'])->name('basicControl.store');






