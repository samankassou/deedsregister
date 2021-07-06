<?php

use App\Http\Controllers\AuthController;
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

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::view('/', 'home')->name('home');
Route::group(
    [
        'middleware' => 'auth',
        'prefix'     => 'admin',
        'as'         => 'admin.'
    ],
    function () {
        Route::get('/dashboard', function () {
            return "Dashboard";
        })->name('dashboard');
    }
);
