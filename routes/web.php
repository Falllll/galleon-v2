<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});


Auth::routes();

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::group(['middleware' => ['role:admin', 'auth']], function () {
        route::get('/', function () {
            return view('admin.index');
        })->name('index');
    });
});

Route::group([
    'prefix' => 'developer',
    'namespace' => 'Developer',
    'as' => 'developer.'
], function () {
    Route::group(['middleware' => ['role:developer', 'auth']], function () {
        route::get('/', function () {
            return view('developer.index');
        })->name('index');
    });
});

//Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

