<?php

namespace App\Http\Controllers;

use App\Models\invoice_attachments;
use App\Models\Invoices;
use App\Models\Invoices_details;
use Illuminate\Http\Request;

class InvoicesDetailsController extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Invoices_details $invoices_details)
    {
        //
    }

    public function edit($id)
    {
        $invoices     = Invoices::where('id',$id)->first();
        $details      = invoices_Details::where('id_Invoice',$id)->get();
        $attachments  = invoice_attachments::where('invoice_id',$id)->get();
        return view('invoices.details_invoice',compact('invoices','details','attachments'));
    }


    public function update(Request $request, Invoices_details $invoices_details)
    {
        //
    }
    public function destroy(Invoices_details $invoices_details)
    {
        //
    }
}
