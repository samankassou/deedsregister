<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeOfRequest;
use Illuminate\Support\Facades\App;

class PrintDeedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $deed = $request->deed;
        $typesOfRequests = TypeOfRequest::all();
        $pdf = App::make('dompdf.wrapper');
        $pdf->getDomPDF()->set_option("enable_php", true);
        $pdf->loadView('admin.deeds.pdfs.show', compact('deed', 'typesOfRequests'));
        return $pdf->stream();
    }
}
