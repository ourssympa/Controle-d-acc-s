<?php

use App\Http\Controllers\mouvement;
use App\Http\Controllers\personne;
use App\Http\Controllers\Qr;
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
Route::get('/',[personne::class,'index'])->name('index');
//warning route pour afficher user avant suppression
Route::get('/personne/warning/{id}',[personne::class,'warning'])->name('personne.warning');
Route::post('/mouvement/sortie/{id}',[mouvement::class,'sortie'])->name('mouvement.sortie');
Route::resource('personne', personne::class);
Route::post("/personne/delete/{id}",[personne::class,'destroy'])->name('personne.destroy');
Route::resource('mouvement', mouvement::class);
Route::get('/qrcode',[Qr::class,'index'])->name('qr.index');
Route::Post('/qrcode',[Qr::class,'mouvement'])->name('qr.mouvement');
