<!DOCTYPE html>
<html>
<head>
    <style>
        .customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 12px !important;
        }

        .customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .customers tr:nth-child(even){background-color: #f2f2f2;}

        .customers tr:hover {background-color: #ddd;}

        .customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            padding-left: 6px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>
{{-- <div>
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/logo.png'))) }}" alt="">
</div> --}}
<h3>Summary</h3>

<table class="customers" >
    <thead>
    <tr>
        <th>Report</th>
        <th>Date</th>
        <th>Total</th>
        <th>Vat</th>
        <th>Payable</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Purchase Report</td>
        <td>{{$FromDate}} to {{$ToDate}}</td>
        <td>{{$total}}</td>
        <td>{{$vat}}</td>
        <td>{{$payable}} </td>
    </tr>
    </tbody>
</table>


<h3>Details</h3>
<table class="customers" >
    <thead>
    <tr>
        <th>Supplier Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Total</th>
        <th>Vat</th>
        <th>Payable</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($list as $item)
        <tr>
            <td>{{$item->suplier->suplier_name}}</td>
            <td>{{$item->suplier->suplier_mobile}}</td>
            <td>{{$item->suplier->suplier_email}}</td>
            <td>{{$item->total }}</td>
            <td>{{$item->payable - $item->total }}</td>
            <td>{{$item->payable }}</td>
            <td>{{$item->created_at->format('d-m-Y') }}</td>
        </tr>
    @endforeach

    </tbody>
</table>
</body>
</html>






