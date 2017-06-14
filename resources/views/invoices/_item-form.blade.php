<div class="col-md-3">
    <div class="form-group">
        {!! Form::label('Item code', '') !!}
        {!! Form::text('item_code[]', old('item_code[]'), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="col-md-5">
    <div class="form-group">
        {!! Form::label('Description', '') !!}
        {!! Form::text('description[]', old('description[]'), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="col-md-1">
    <div class="form-group">
        {!! Form::label('Quantity', '') !!}
        {!! Form::text('quantity[]', '', ['class' => 'form-control']) !!}
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
        {!! Form::label('Price each', '') !!}
        {!! Form::text('price_each[]', '', ['class' => 'form-control']) !!}
    </div>
</div>
{{--<div class="col-md-1">--}}
{{--<div class="form-group">--}}
{{--{!! Form::label('Amount', '') !!}--}}
{{--{!! Form::text('amount[]', '', ['class' => 'form-control']) !!}--}}
{{--</div>--}}
{{--</div>--}}
<div class="col-md-1">
    <div class="form-group">
        <button class="btn btn-primary" style="margin-top:25px;" type="button" id="add-row">
            Add <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
    </div>
</div>
