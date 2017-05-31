<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        h1, h2, h3, h4, h5, h6, p {
            font-family: Raleway, 'sans-serif';
        }
        th {
            background-color: gainsboro;
            text-align: center;
        }
    </style>
{{--<link rel="stylesheet" href="css/pdf.css">--}}
{{--<link rel="stylesheet" href="css/app.css">--}}

{{--<link href="css/bootstrap.min.css" rel="stylesheet">--}}
{{--<link href="../../../public/css/app.css" rel="stylesheet">--}}
<!-- Latest compiled and minified CSS -->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"--}}
    {{--integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1><strong>INVOICE</strong></h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <h4><strong>JJJ WINDOWS & DOORS <br>
                    INSTALLATION CORP</strong></h4>
            <p>9911 W OKEECHOBEE RD APT 510 <br>
                HIALEAH GARDENS, FL 33016</p>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <h4><strong>Invoice #: </strong> {{$invoice->number}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4><strong>Date: </strong> {{$invoice->date}}</h4>
        </div>
    </div>

    <br><br>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Bill to</th>
                    <th>Ship to</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{!!html_entity_decode($invoice->bill_to)!!}</td>
                    <td>{!!html_entity_decode($invoice->ship_to)!!}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>P.O. #</th>
                    <th>Rep</th>
                    <th>Ship</th>
                    <th>Via</th>
                    <th>F.O.B.</th>
                    <th>Project</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Item-code</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price each</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoice->details as $detail)
                <tr>
                    <td>{{$detail->item_code}}</td>
                    <td>{{$detail->description}}</td>
                    <td>{{$detail->quantity}}</td>
                    <td>{{$detail->price_each}}</td>
                    <td>{{$detail->total_item}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-right">
            <h4><strong>Total: </strong>{{$total}}</h4>
            <h3><strong>Balance due: </strong>{{$total}}</h3>
        </div>
    </div>
</div>
</body>
</html>
