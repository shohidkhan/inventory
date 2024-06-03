<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SuplierInvoice;
use App\Models\SuplierInvoiceProduct;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {
    //
    function createProduct(Request $request) {
        DB::beginTransaction();
        try {

            $request->validate([
                "name" => "required|string",
                "price" => "required|numeric",
                "buying_price" => "required|numeric",
                "unit" => "required|string",
                "img_url" => "required|image",
                "brand_id" => "required",
                "suplier_id" => "required",
                "stock" => "required",
            ]);

            $user_id = Auth::id();
            //perpare img path and name
            $img = $request->file("img_url");
            $time = time();
            $file_orginal_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$time}-{$file_orginal_name}";

            //img url
            $img_url = "uploads/products/{$img_name}";
            //img upload
            $img_upload = $img->move(public_path("uploads/products"), $img_name);

            //insert product
            $product = Product::create([
                "name" => $request->input("name"),
                "buying_price" => $request->input("buying_price"),
                "price" => $request->input("price"),
                "unit" => $request->input("unit"),
                "category_id" => $request->input("category_id"),
                "img_url" => $img_url,
                "user_id" => $user_id,
                "stock" => $request->input("stock"),
                "brand_id" => $request->input("brand_id"),
                "suplier_id" => $request->input("suplier_id"),
            ]);
            $product_id = $product->id;

            $supplier_invoice_no = "SINV-" . time();
            $total = $request->input("buying_price") * $request->input("stock");
            $payable = $total;
            $supplier_id = $request->input("suplier_id");
            $brand_id = $request->input("brand_id");

            $supplier_invoice = SuplierInvoice::create([
                "supplier_invoice_no" => $supplier_invoice_no,
                "total" => $total,
                "payable" => $payable,
                "suplier_id" => $supplier_id,
                "user_id" => Auth::id(),
            ]);

            $supplier_invoice_id = $supplier_invoice->id;

            SuplierInvoiceProduct::create([
                "suplier_invoice_id" => $supplier_invoice_id,
                "brand_id" => $brand_id,
                "product_id" => $product_id,
                "user_id" => Auth::id(),
                "qty" => $request->input("stock"),
                "purchase_price" => $request->input("buying_price"),
            ]);

            DB::commit();

            return response()->json(["status" => "success", "message" => "product created successfully and supplier invoice created"], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(["status" => "error", "message" => $e->getMessage()], 200);
        }
    }

    function productList() {
        $user_id = Auth::id();

        //show top selling product
        // $top_selling_product = Product::withSum("invoiceProducts", "qty")->where("user_id", $user_id)->orderBy("invoiceProducts_sum_qty", "desc")->first();

        $products = Product::withSum("invoiceProducts", "qty")
            ->where("user_id", $user_id)
            ->with("category", "suplier", "brand", "invoiceProducts")
            ->orderBy("invoice_products_sum_qty", "asc")
            ->get();
        return $products;
    }

    function singleProduct(Request $request) {
        try {
            $user_id = Auth::id();
            $product_id = $request->input("id");
            $product = Product::where("user_id", $user_id)->where("id", $product_id)->first();
            return $product;
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    function updateProduct(Request $request) {
        try {
            $user_id = Auth::id();
            $product_id = $request->input("id");
            if ($request->hasFile("img_url")) {
                $request->validate([
                    "category_id" => "required",
                    "name" => "required|string|max:100",
                    "price" => "required|numeric",
                    "unit" => "required",
                    "img_url" => "required|mimes:png,jpg,jpeg|image",
                    "stock" => "required",
                    "brand_id" => "required",
                    "suplier_id" => "required",
                ]);

                $product = Product::where("user_id", $user_id)->where("id", $product_id)->first();
                $removed_file = unlink(public_path($product->img_url));

                $img = $request->file("img_url");
                $time = time();
                $file_orginal_name = $img->getClientOriginalName();
                $img_name = "{$user_id}-{$time}-{$file_orginal_name}";
                $img_url = "uploads/products/{$img_name}";
                $img_upload = $img->move(public_path("uploads/products"), $img_name);
                Product::where("user_id", $user_id)->where("id", $product_id)->update([
                    "category_id" => $request->input("category_id"),
                    "user_id" => $user_id,
                    "name" => $request->input("name"),
                    "price" => $request->input("price"),
                    "unit" => $request->input("unit"),
                    "img_url" => $img_url,
                    "stock" => $request->input("stock"),
                    "brand_id" => $request->input("brand_id"),
                    "suplier_id" => $request->input("suplier_id"),
                ]);
                return response()->json(["status" => "success", "message" => "product updated successfully with image"]);
            } else {
                $request->validate([
                    "category_id" => "required",
                    "name" => "required|string|max:100",
                    "price" => "required|numeric",
                    "unit" => "required",
                    "stock" => "required",
                    "brand_id" => "required",
                    "suplier_id" => "required",
                ]);
                Product::where("user_id", $user_id)->where("id", $product_id)->update([
                    "category_id" => $request->input("category_id"),
                    "user_id" => $user_id,
                    "name" => $request->input("name"),
                    "price" => $request->input("price"),
                    "unit" => $request->input("unit"),
                    "img_url" => $request->input("oldImgFromDb"),
                    "stock" => $request->input("stock"),
                    "brand_id" => $request->input("brand_id"),
                    "suplier_id" => $request->input("suplier_id"),
                ]);
                return response()->json(["status" => "success", "message" => "product updated successfully without image"]);
            }

        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }

    function deleteProduct(Request $request) {
        try {
            $user_id = Auth::id();
            $product_id = $request->input("id");
            $product = Product::where("user_id", $user_id)->where("id", $product_id)->first();
            $removed_file = unlink(public_path($product->img_url));
            Product::where("user_id", $user_id)->where("id", $product_id)->delete();
            return response()->json(["status" => "success", "message" => "product deleted successfully"]);
        } catch (Exception $e) {
            return response()->json(["status" => "error", "message" => $e->getMessage()]);
        }
    }
}
