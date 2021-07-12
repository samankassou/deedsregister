<?php

namespace App\Providers;

use App\Models\Deed;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $deedsCount = Deed::count();
        $deletedDeedsCount = Deed::onlyTrashed()->count();
        View::composer('admin.deeds.*', function ($view) use ($deedsCount, $deletedDeedsCount) {
            $view->with([
                'deedsCount' => $deedsCount,
                'deletedDeedsCount' => $deletedDeedsCount
            ]);
        });
    }
}
