<!DOCTYPE html>
<html>
<head>
   {{-- <link rel="stylesheet" href="{{ public_path("pdf.css") }}"> --}}
   <style>
    
    .company_info{
        margin-bottom: 50px;
        font-family: sans-serif;
        display: flow-root;
    }
    .common{
        display: inline;
    }
    .right{
        float: right;
        clear: both;
    }
    .left{
        float: left;
        clear: both;
    }
    .clear_fit{
        clear: both;
    }
    .top_title{
        text-align: center;
        margin-bottom: 40px;
        font-family: Arial, Helvetica, sans-serif;
    }
    .container{
        margin:20px;
        border: 1px solid gray;
        padding: 20px;
    }
    .customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        font-size: 12px !important;
    }
    p{
        font-family: sans-serif;
        margin: 10px 0;
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

<div class="container">
    <div class="top_title">
        <h1>Sales Report</h1>
    </div>
    <div class="company_info">
        <div class="left commmon">
            
            <p>Comapny Name: <strong>.SHOP</strong></p>
            <p>Email: <strong>shop@yahoo.com</strong></p>
            <p>Address: <strong>Dhanmondi, Dhaka</strong></p>
            <p>Phone: <strong>+880167777777	</strong></p>
        </div>
        <div class="right common">
            <a style="display: block; margin-bottom: 20px" href="https://ibb.co/Gxvtndv"><img style="width: 75px;" src="https://i.ibb.co/bWg2Q6g/logo.png" alt="logo" border="0"></a>
            <span>Date</span>  
            <p>From: </p> 
            <p>To: </p> 
        </div>
        <div class="clear_fit"></div>
    </div>

    <div>
        <h3>Summary</h3>
    
        <table class="customers" >
            <thead>
            <tr>
                <th>Report</th>
                <th>Date</th>
                <th>Total</th>
                <th>Discount</th>
                <th>Vat</th>
                <th>Payable</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Sales Report</td>
                {{-- <td>{{$FormDate}} to {{$ToDate}}</td>
                <td>{{$total}}</td>
                <td>{{$discount}}</td>
                <td>{{$vat}}</td>
                <td>{{$payable}} </td> --}}
            </tr>
            </tbody>
        </table>
    </div>
    
    
    <div>
        <h3>Details</h3>
        <table class="customers" >
            <thead>
            <tr>
                <th>Customer</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Total</th>
                <th>Discount</th>
                <th>Vat</th>
                <th>Payable</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            {{-- @foreach ($list as $item)
                <tr>
                    <td>{{$item->customer->name}}</td>
                    <td>{{$item->customer->mobile}}</td>
                    <td>{{$item->customer->email}}</td>
                    <td>{{$item->total }}</td>
                    <td>{{$item->discount }}</td>
                    <td>{{$item->vat }}</td>
                    <td>{{$item->payable }}</td>
                    <td>{{$item->created_at->format('d-m-Y') }}</td>
                </tr>
            @endforeach --}}
    
            </tbody>
        </table>
    </div>
</div>
</body>
</html>




