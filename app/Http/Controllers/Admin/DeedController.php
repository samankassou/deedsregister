<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deed;
use App\Models\Pole;
use Illuminate\Http\Request;

class DeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deeds = Deed::with([
            'pole',
            'agency',
            'warranty',
            'typeOfRequests'
        ])->paginate(10);
        return view('admin.deeds.index', compact('deeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deeds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deed  $deed
     * @return \Illuminate\Http\Response
     */
    public function show(Deed $deed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deed  $deed
     * @return \Illuminate\Http\Response
     */
    public function edit(Deed $deed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deed  $deed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deed $deed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deed  $deed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deed $deed)
    {
        //
    }
}
