<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deed;
use App\Models\User;
use App\Models\Agency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data['total_clients'] = Deed::select(['client_code'])->distinct()->count();
        $data['total_users'] = User::count();
        $data['total_agencies'] = Agency::count();
        $data['total_writtings'] = Deed::select(['client_code'])
            ->distinct()
            ->count();
        $data['total_deeds'] = Deed::count();
        return view('admin.dashboard', $data);
    }
}
