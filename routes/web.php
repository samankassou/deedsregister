<?php

use App\Charts\TypesOfRequestsChart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\DeedController;
use App\Http\Controllers\Admin\UserController;

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
Route::get('types-of-requests-chart', [TypesOfRequestsChart::class, 'handler'])->name('charts.typesOfRequests.chart')->prefix('charts');
Route::group(
    [
        'middleware' => 'auth',
        'prefix'     => 'admin',
        'as'         => 'admin.'
    ],
    function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');

        //deeds routes

        Route::get('deeds/{deed}/print', [DeedController::class, 'print'])->name('deeds.print');
        Route::get('deeds/deleted', [DeedController::class, 'deleted'])->name('deeds.deleted');
        Route::resource('deeds', DeedController::class);
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::view('agencies', 'admin.agencies.index')->name('agencies.index');
        Route::view('warranties', 'admin.warranties.index')->name('warranties.index');
    }
);
