<?php

use App\Mail\TestMail;
use App\Charts\TypesOfRequestsChart;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\PrintDeedController;
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

Route::view('/', 'home')->name('home');


//deeds routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // admin prefix and name
    Route::prefix('admin')->as('admin.')->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');

        //admin only routes
        Route::middleware(['role:admin'])->group(function () {
            Route::view('agencies', 'admin.agencies.index')->name('agencies.index');
            Route::view('warranties', 'admin.warranties.index')->name('warranties.index');
            Route::view('users', 'admin.users.index')->name('users.index');
        });

        //commons routes(admin and writter)
        Route::view('deeds/deleted', 'admin.deeds.deleted.index')->name('deeds.deleted.index');
        Route::get('deeds/{deed}/print', PrintDeedController::class)
            ->name('deeds.print');
        Route::view('deeds', 'admin.deeds.index')->name('deeds.index');
        Route::view('deeds/create', 'admin.deeds.create')->name('deeds.create');
        Route::view('deeds/{deed}/edit', 'admin.deeds.edit')->name('deeds.edit');
        Route::view('deeds/{deed}', 'admin.deeds.show')->name('deeds.show');
    });
});
