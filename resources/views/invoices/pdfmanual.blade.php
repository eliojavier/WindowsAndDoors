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
        body {
            font-size: 1.2em;
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
    <div class="row">
        <div class="col-md-12">
            <h4><strong>JJJ WINDOWS & DOORS <br>
                    INSTALLATION CORP</strong></h4>
            {{--<p>9911 W OKEECHOBEE RD APT 510 <br>--}}
                {{--HIALEAH GARDENS, FL 33016</p>--}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4><strong>Invoice #: </strong> 1507</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4><strong>Date: </strong> 2018-03-17</h4>
        </div>
    </div>

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
                    <td class="text-justify">Nicolás (305-450-2826)</td>
                    <td class="text-justify">Nicolás (305-450-2826)</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{--<div class="row">--}}
        {{--<div class="col-md-12">--}}
            {{--<table class="table table-bordered">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>P.O. #</th>--}}
                    {{--<th>Rep</th>--}}
                    {{--<th>Ship</th>--}}
                    {{--<th>Via</th>--}}
                    {{--<th>F.O.B.</th>--}}
                    {{--<th>Project</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--<tr>--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                {{--</tr>--}}
                {{--</tbody>--}}
            {{--</table>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Item-code</th>
                    <th>Description</th>
                    <th>Qty.</th>
                    <th>Unit price</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-justify">HR</td>
                    <td class="text-justify">white/clear glass/full view Impact windows</td>
                    <td class="text-justify">5</td>
                    <td class="text-justify">760</td>
                    <td class="text-justify">3800</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-right">
            <h5><strong>Subtotal: </strong>$3800</h5>
            {{--<h5><strong>Sales Tax (7.0%): </strong>{{number_format($tax, 2)}}$</h5>--}}
            <h5><strong>Down payment: </strong>$1900</h5>
            <br>
            <h3><strong>Balance due: </strong>$1900</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h5>Signature: ____________________</h5>
        </div>
    </div>
</div>
</body>
</html>
