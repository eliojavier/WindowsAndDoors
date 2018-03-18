<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Invoice;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $invoices = Invoice::select('id', 'number', 'bill_to', 'full_path')
                            ->orderBy('updated_at', 'DESC')
                            ->get();
        return response()->json(['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_id = Invoice::max('number');
        $invoice_number = $last_id + 1;
        
        $current_date = Carbon::now();
        return view('invoices.create', compact('invoice_number', 'current_date'));
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
        $invoice->bill_to = $request->billTo;
        $invoice->ship_to = $request->shipTo;
        $invoice->subtotal = $request->subtotal;
        $invoice->down_payment = $request->downPayment;
        $invoice->total = $request->total;
        $invoice->save();

        $items = $request->items;

        $tax = 0;

        foreach($items as $item)
        {
            $detail = new Detail();
            $detail->item_code = $item["itemCode"];
            $detail->description = $item["description"];
            $detail->quantity = $item["quantity"];
            $detail->price_each = $item["priceEach"];
            $detail->total_item = $item["quantity"] * $item["priceEach"];

            if(trim($detail->item_code) != 'Installation'){
                $detail->item_tax = $detail->price_each * 0.07;
                $tax += $detail->price_each * 0.07;
            }

            $detail->invoice()->associate($invoice);
            $detail->save();
        }

        $subtotal = 0;
        foreach($invoice->details as $detail){
            $subtotal += $detail->total_item;
        }

//        $tax = $subtotal * 0.07;

        $down_payment = 0;
        if ($invoice->down_payment != null){
            $down_payment = $invoice->down_payment;
        }
        $total = $subtotal + $tax - $down_payment;

        $invoice->path = 'invoices/'.$invoice->number.'.pdf';
        $invoice->full_path = 'http://' . $_SERVER['HTTP_HOST'] . '/' . 'invoices/'.$invoice->number.'.pdf';

        $invoice->update();
        
        $pdf = PDF::loadView('invoices.pdf', compact('invoice', 'subtotal', 'tax', 'down_payment', 'total'))->setPaper('a4', 'portrait');
        $pdf->save($invoice->path);

        return response()->json(['success' => true, 'message' => 'invoice created']);
//        return $pdf->stream('invoice.pdf');
        
    }

    public function generateInvoice()
    {
        $invoice = 1507;
        $subtotal = 3800;
        $down_payment = 1900;
        $tax = 0;
        $total = 1900;
        $pdf = PDF::loadView('invoices.pdfmanual', compact('invoice', 'subtotal', 'tax', 'down_payment', 'total'))->setPaper('a4', 'portrait');
        $pdf->save('invoices/1507.pdf');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return response()->json(['invoice' => $invoice->load('details')]);
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

    public function sendByEmail(Invoice $invoice)
    {
        Mail::send(new \App\Mail\Invoice($invoice->number));
    }

    public function download(Invoice $invoice)
    {
        $path = 'http://' . $_SERVER['HTTP_HOST'] . '/' .$invoice->full_path;
        return response()->json(['path' => $path]);
    }
}
