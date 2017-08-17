@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a href="invoices/create">
                    <button class="btn btn-primary">Create Invoice</button>
                </a>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="table-responsive col-md-12">
                    <table id="invoices_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Number</th>
                            <th>Date</th>
                            <th>Bill To</th>
                            <th>Ver</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{$invoice->number}}</td>
                                <td>{{$invoice->date}}</td>
                                <td>{!!html_entity_decode($invoice->bill_to)!!}</td>
                                <td>
                                    <a href="{{ asset('invoices/' . $invoice->number . '.pdf') }}" target="_blank">
                                        <button type="button" class="btn btn-primary">
                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/datatables.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#invoices_table').DataTable({
                "order": [[0, "desc"]]
            });
        });
    </script>
@endsection