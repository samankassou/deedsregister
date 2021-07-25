<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TypeOfRequest;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\Deed;

class PrintDeedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Deed $deed)
    {
        $typesOfRequests = TypeOfRequest::all();
        $pdf = App::make('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('admin.deeds.pdfs.show', compact('deed', 'typesOfRequests'));
        return $pdf->stream();
    }
}
