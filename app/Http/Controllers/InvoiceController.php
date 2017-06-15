<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Invoice;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view ('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = new Invoice();
        $invoice->number = $request->number;
        $invoice->date = $request->date;
        $invoice->bill_to = $request->bill_to;
        $invoice->ship_to = $request->ship_to;
        $invoice->down_payment = $request->down_payment;
        $invoice->save();

        $total_items = sizeof($request->item_code);

        for ($i = 0; $i < $total_items; $i++) {
            $detail = new Detail();
            $detail->item_code = $request->item_code[$i];
            $detail->description = $request->description[$i];
            $detail->quantity = $request->quantity[$i];
            $detail->price_each = $request->price_each[$i];
            $detail->total_item = $request->quantity[$i] * $request->price_each[$i];

            $detail->invoice()->associate($invoice);
            $detail->save();
        }

        $subtotal = 0;
        foreach($invoice->details as $detail){
            $subtotal += $detail->total_item;
        }

        
        $tax = $subtotal * 0.07;

        $down_payment = 0;
        if ($invoice->down_payment != null){
            $down_payment = $invoice->down_payment;
        }
        $total = $subtotal + $tax - $down_payment;

        $invoice->file_path = 'invoices/'.$invoice->number.'.pdf';

        $invoice->update();

        $pdf = PDF::loadView('invoices.pdf', compact('invoice', 'subtotal', 'tax', 'down_payment', 'total'))->setPaper('a4', 'portrait');
        $pdf->save($invoice->file_path);


        Mail::send(new \App\Mail\Invoice($invoice->number));

//        return $pdf->save('invoices/'.$invoice->number.'.pdf')->stream('invoice.pdf');
        return $pdf->stream('invoice.pdf');
//        return $pdf->stream('invoice.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
