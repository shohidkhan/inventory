<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\SuplierInvoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    //

    function salesReport(Request $request)
    {
        $user_id=Auth::id();
        $FormDate=date("Y-m-d",strtotime($request->FormDate));
        $ToDate=date("Y-m-d",strtotime($request->ToDate));
        
        $total= Invoice::where("user_id",$user_id)->whereDate("created_at",">=",$FormDate)->whereDate("created_at","<=",$ToDate)->sum("total");

        $discount= Invoice::where("user_id",$user_id)->whereDate("created_at",">=",$FormDate)->whereDate("created_at","<=",$ToDate)->sum("discount");

        $vat= Invoice::where("user_id",$user_id)->whereDate("created_at",">=",$FormDate)->whereDate("created_at","<=",$ToDate)->sum("vat");

        $payable= Invoice::where("user_id",$user_id)->whereDate("created_at",">=",$FormDate)->whereDate("created_at","<=",$ToDate)->sum("payable");

        $list=Invoice::where("user_id",$user_id)->whereDate("created_at",">=",$FormDate)->whereDate("created_at","<=",$ToDate)->with("customer")->get();


        $data=[
            "total"=>$total,
            "discount"=>$discount,
            "vat"=>$vat,
            "payable"=>$payable,
            "list"=>$list,
            "FormDate"=>$FormDate,
            "ToDate"=>$ToDate
        ];
        
        $pdf=Pdf::loadView("report.SalesReport",$data);
        
        return $pdf->download("sells-invoice.pdf");

    }

    function purchaseReport(Request $request){
        try{
            $user_id=Auth::id();
            $FromDate=date("Y-m-d",strtotime($request->FromDate));
            $ToDate=date("Y-m-d",strtotime($request->ToDate));

            $total=SuplierInvoice::where("user_id",$user_id)->where("created_at",">=",$FromDate)->where("created_at","<=",$ToDate)->sum("total");
            $payable=SuplierInvoice::where("user_id",$user_id)->where("created_at",">=",$FromDate)->where("created_at","<=",$ToDate)->sum("payable");
            $vat=$payable - $total;
            $list=SuplierInvoice::where("user_id",$user_id)->where("created_at",">=",$FromDate)->where("created_at","<=",$ToDate)->with("suplier")->get();
            $data=[
                "total"=>$total,
                "vat"=>$vat,
                "payable"=>$payable,
                "list"=>$list,
                "FromDate"=>$FromDate,
                "ToDate"=>$ToDate  
            ];
            $pdf=Pdf::loadView("report.purchaseReport",$data);
            return $pdf->download("invoice.pdf");

        }catch(Exception $e){
            return response()->json(["status"=>"error","message"=>$e->getMessage()]);
        }
    }
}
