<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController ; 
use App\Http\Controllers\MenageStatusController ;
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

Route::get("/",[FormController::class,"index"]) ; 
Route::post("/saveTestimonial",[FormController::class,"store"])->name("addTest") ; 
Route::get("/listTestimonial",[MenageStatusController::class,"index"]) ; 
Route::get('/changeStatus/{id}', [MenageStatusController::class,"setStatus"])->name("Changer");