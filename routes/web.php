<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\VisitorController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','App\Http\Controllers\UserController@getLogin');

Route::get('generate-shorten-link', [ShortLinkController::class,'index'])->name('shortlink');
Route::post('generate-shorten-link', [ShortLinkController::class,'store'])->name('generate-shorten-link.post');

//create account with email and username
//Route::get('/register','App\Http\Controllers\UserController@getRegister');
//Route::post('/register','App\Http\Controllers\UserController@postRegister')->name('user.create');

//login - check session username
Route::get('/login','App\Http\Controllers\UserController@getLogin');
Route::post('/login','App\Http\Controllers\UserController@checkLogin')->name('user.login');

//visitor
Route::get('/visitor-manage','App\Http\Controllers\VisitorController@index')->name('visitor.manage');

//Route Shortlink
Route::get('short-link/{id}',[ShortLinkController::class,'delete'])->name('shortlink.delete');
Route::get('{code}', [ShortLinkController::class,'shortenLink'])->name('shorten.link');

