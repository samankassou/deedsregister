<?php


use App\Models\Deed;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\PrintDeedController;

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
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

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
        Route::get('deeds/deleted/{id}', function ($id) {
            $deed = Deed::onlyTrashed()->findOrFail($id);
            return view('admin.deeds.deleted.show', compact('deed'));
        })->name('deeds.deleted.show');
        Route::get('deeds/{deed}/print', PrintDeedController::class)
            ->name('deeds.print');
        Route::view('deeds', 'admin.deeds.index')->name('deeds.index');
        Route::view('deeds/create', 'admin.deeds.create')->name('deeds.create');
        Route::get('deeds/{deed}/edit', function (Deed $deed) {
            return view('admin.deeds.edit', compact('deed'));
        })->name('deeds.edit');
        Route::get('deeds/{deed}', function (Deed $deed) {
            return view('admin.deeds.show', compact('deed'));
        })->name('deeds.show');
        Route::view('settings', 'admin.settings.index')->name('settings.index');
        Route::view('help', 'admin.help')->name('help');
    });
});
