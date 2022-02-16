<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;

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
    return view('welcome');
});

Route::post('/save_expenses', [Controller::class, 'save_expenses']);
Route::post('/show_table', [Controller::class, 'show_table']);


