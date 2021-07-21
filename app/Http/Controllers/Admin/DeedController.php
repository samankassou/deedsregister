<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deed;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\TypeOfRequest;

class DeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.deeds.index');
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
     * Display the specified resource.
     *
     * @param  \App\Models\Deed  $deed
     * @return \Illuminate\Http\Response
     */
    public function show(Deed $deed)
    {
        return view('admin.deeds.show', compact('deed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deed  $deed
     * @return \Illuminate\Http\Response
     */
    public function edit(Deed $deed)
    {
        return view('admin.deeds.edit', compact('deed'));
    }

    /**
     * List deleted resources.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleted()
    {
        return view('admin.deeds.deleted.index');
    }

    /**
     * Print the deed to pdf.
     *
     * @param  \App\Models\Deed  $deed
     */
    public function print(Deed $deed)
    {
        $typesOfRequests = TypeOfRequest::all();
        $pdf = App::make('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('admin.deeds.pdfs.show', compact('deed', 'typesOfRequests'));
        return $pdf->stream();
    }
}
