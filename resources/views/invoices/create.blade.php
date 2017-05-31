@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center"><strong>Invoice data</strong></div>
                    <div class="panel-body">
                        {!! Form::open(['url' => 'admin/invoices']) !!}
                        <div class="row">
                            <div class="form-group col-md-6">
                                {!! Form::label('Invoice number', '') !!}
                                {!! Form::text('number', old('number'), ['class' => 'form-control', 'placeholder' => 'Invoice number']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('Date', '') !!}
                                {!! Form::date('date', old('date'), ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Bill To', '') !!}
                                    {!! Form::textarea('bill_to', old('bill_to'), ['class' => 'form-control', 'placeholder' => 'Bill to', 'id'=>'sn_bill_to']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Ship To', '') !!}
                                    {!! Form::textarea('ship_to', old('ship_to'), ['class' => 'form-control', 'placeholder' => 'Ship to', 'id'=>'sn_ship_to']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @include('invoices._item-form')
                        </div>
                        <div class="row" id="item-row">

                        </div>
                        <invoice-item></invoice-item>
                        <div class="form-group text-center">
                            {!! Form::submit('Aceptar', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/summernote.min.js') }}"></script>
    {{--<script src="https://unpkg.com/vue"></script>--}}
    <script>
        $('#sn_bill_to').summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']]
            ],
            height: 150
        });
        $('#sn_ship_to').summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']]
            ],
            height: 150
        });


        $('#add-row').click(function () {
            var elem ='<div class="col-md-3">' +
                    '<div class="form-group">' +
                    '{!! Form::label('Item code', '') !!}' +
                    '{!! Form::text('item_code[]', '', ['class' => 'form-control']) !!}' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-5">' +
                    '<div class="form-group">' +
                    '{!! Form::label('Description', '') !!}' +
                    '{!! Form::text('description[]', '', ['class' => 'form-control']) !!}' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-1">' +
                    '<div class="form-group">' +
                    '{!! Form::label('Quantity', '') !!}' +
                    '{!! Form::text('quantity[]', '', ['class' => 'form-control']) !!}' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<div class="form-group">' +
                    '{!! Form::label('Price each', '') !!}' +
                    '{!! Form::text('price_each[]', '', ['class' => 'form-control']) !!}' +
                    '</div>' +
                    '</div>';
            $('#item-row').append($(elem));
        });
    </script>
@endsection