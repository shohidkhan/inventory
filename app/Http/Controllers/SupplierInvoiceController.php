<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use App\Models\SuplierInvoice;
use App\Models\SuplierInvoiceProduct;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplierInvoiceController extends Controller {
    //

    function supplierPurchase() {
        return view("pages.dashboard.purchase-page");
    }

    // function createSupplierInvoice(Request $request){
    //     DB::beginTransaction();
    //     try{
    //         $request->validate([
    //             "total"=>"required",
    //             "payable"=>"required",
    //             "suplier_id"=>"required"
    //         ]);

    //         $supplier_invoice_no="SINV-".time();

    //         $total=$request->input("total");
    //         $payable=$request->input("payable");
    //         $supplier_id=$request->input("suplier_id");
    //         $brand_id=$request->input("brand_id");
    //         $supplier_products=$request->input("products");

    //         $supplier_invoice=SuplierInvoice::create([
    //             "supplier_invoice_no"=>$supplier_invoice_no,
    //             "total"=>$total,
    //             "payable"=>$payable,
    //             "suplier_id"=>$supplier_id,
    //             "user_id"=>Auth::id(),
    //         ]);

    //         $supplier_invoice_id=$supplier_invoice->id;

    //         foreach($supplier_products as $EachProduct){
    //             SuplierInvoiceProduct::create([
    //                 "suplier_invoice_id"=>$supplier_invoice_id,
    //                 "brand_id"=>$EachProduct["brand_id"],
    //                 "suplier_product_id"=>$EachProduct["suplier_product_id"],
    //                 "user_id"=>Auth::id(),
    //                 "qty"=>$EachProduct["qty"],
    //                 "purchase_price"=>$EachProduct["purchase_price"],
    //             ]);

    //             SuplierProduct::where("id",$EachProduct["suplier_product_id"])->update([
    //                 "stock"=>0
    //             ]);
    //         }
    //         DB::commit();
    //         return response()->json(["status"=>"success","message"=>"Supplier Invoice created successfully"],200);
    //     }catch(Exception $e){
    //         DB::rollBack();
    //         return response()->json(["status"=>"error","message"=>$e->getMessage()],200);
    //     }
    // }

    function supplierInvoiceList() {
        try {
            $purchase_invoices = SuplierInvoice::with("suplier", "brand", "user")->where("user_id", Auth::id())->orderBy("id", "desc")->get();

            return $purchase_invoices;
        } catch (Exception $e) {
            return response()->json(["error" => "error", "message" => $e->getMessage()]);
        }
    }

    function supplierInvoiceDetails(Request $request) {
        try {
            $suplier_id = $request->input("suplier_id");
            $suplier_invoice_id = $request->input("suplier_invoice_id");

            $suplier = Suplier::where("id", $suplier_id)->where("user_id", Auth::id())->first();

            $suplier_invoice = SuplierInvoice::where("id", $suplier_invoice_id)->where("user_id", Auth::id())->first();

            $suplier_invoice_products = SuplierInvoiceProduct::where("suplier_invoice_id", $suplier_invoice_id)->with("brand", "suplierInvoice", "product", "product.suplier")->get();

            return [
                "suplier" => $suplier,
                "suplier_invoice" => $suplier_invoice,
                "suplier_invoice_products" => $suplier_invoice_products,
            ];
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    function supplierDeleteInvoice(Request $request) {
        DB::beginTransaction();
        try {
            $suplier_invoce_id = $request->input("suplier_invoce_id");
            SuplierInvoiceProduct::where("user_id", Auth::id())->where("suplier_invoice_id", $suplier_invoce_id)->delete();
            SuplierInvoice::where("user_id", Auth::id())->where("id", $suplier_invoce_id)->delete();

            DB::commit();

            return response()->json(["status" => "success", "message" => "Supplier Invoice deleted successfully"], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }
}
