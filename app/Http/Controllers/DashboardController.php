<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Suplier;
use App\Models\SuplierInvoice;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
    //

    function summary() {
        $user_id = Auth::id();
        $products = Product::where("user_id", $user_id)->count();
        $categories = Category::where("user_id", $user_id)->count();
        $customers = Customer::where("user_id", $user_id)->count();
        $invoices = Invoice::where("user_id", $user_id)->count();
        $total = Invoice::where("user_id", $user_id)->sum("total");
        $vat = Invoice::where("user_id", $user_id)->sum("vat");
        $payable = Invoice::where("user_id", $user_id)->sum("payable");

        $suppliers = Suplier::where("user_id", $user_id)->count();
        $brands = Brand::where("user_id", $user_id)->count();
        $supplier_invoices = SuplierInvoice::where("user_id", $user_id)->count();
        $total_purchase = SuplierInvoice::where("user_id", $user_id)->sum("payable");

        //today sale
        $today_sale = Invoice::where("user_id", $user_id)->whereDate("created_at", date("Y-m-d"))->sum("payable");
        //this week sale
        $this_week_sale = Invoice::where("user_id", $user_id)->whereBetween("created_at", [date("Y-m-d", strtotime("-7 days")), date("Y-m-d")])->sum("payable");
        // last week sale
        $last_week_sale = Invoice::where("user_id", $user_id)->whereBetween("created_at", [date("Y-m-d", strtotime("-14 days")), date("Y-m-d", strtotime("-7 days"))])->sum("payable");
        //this month sale
        $this_month_sale = Invoice::where("user_id", $user_id)->whereMonth("created_at", date("m"))->sum("payable");
        //this year sale
        $this_year_sale = Invoice::where("user_id", $user_id)->whereYear("created_at", date("Y"))->sum("payable");
        //last year sale
        $last_year_sale = Invoice::where("user_id", $user_id)->whereYear("created_at", date("Y") - 1)->sum("payable");
        //last month sale
        $last_month_sale = Invoice::where("user_id", $user_id)->whereMonth("created_at", date("m") - 1)->sum("payable");
        //yesterday sale
        $yesterday_sale = Invoice::where("user_id", $user_id)->whereDate("created_at", date("Y-m-d", strtotime("-1 days")))->sum("payable");

        //total profit
        $total_profit = Invoice::where("user_id", $user_id)->sum("profit");
        //today profit
        $today_profit = Invoice::where("user_id", $user_id)->whereDate("created_at", date("Y-m-d"))->sum("profit");
        //yesterday profit
        $yesterday_profit = Invoice::where("user_id", $user_id)->whereDate("created_at", date("Y-m-d", strtotime("-1 days")))->sum("profit");
        //this week profit
        $this_week_profit = Invoice::where("user_id", $user_id)->whereBetween("created_at", [date("Y-m-d", strtotime("-7 days")), date("Y-m-d")])->sum("profit");
        //last week profit
        $last_week_profit = Invoice::where("user_id", $user_id)->whereBetween("created_at", [date("Y-m-d", strtotime("-14 days")), date("Y-m-d", strtotime("-7 days"))])->sum("profit");
        //this month profit
        $this_month_profit = Invoice::where("user_id", $user_id)->whereMonth("created_at", date("m"))->sum("profit");
        //this year profit
        $this_year_profit = Invoice::where("user_id", $user_id)->whereYear("created_at", date("Y"))->sum("profit");
        //last year profit
        $last_year_profit = Invoice::where("user_id", $user_id)->whereYear("created_at", date("Y") - 1)->sum("profit");
        //last month profit
        $last_month_profit = Invoice::where("user_id", $user_id)->whereMonth("created_at", date("m") - 1)->sum("profit");

        return [
            "products" => $products,
            "categories" => $categories,
            "customers" => $customers,
            "invoices" => $invoices,
            "total" => round($total, 2),
            "vat" => round($vat, 2),
            "payable" => round($payable, 2),
            "suppliers" => $suppliers,
            "brands" => $brands,
            "supplier_invoices" => $supplier_invoices,
            "total_purchase" => round($total_purchase, 2),

            "today_sale" => round($today_sale, 2),
            "this_month_sale" => round($this_month_sale, 2),
            "this_year_sale" => round($this_year_sale, 2),
            "last_year_sale" => round($last_year_sale, 2),
            "last_month_sale" => round($last_month_sale, 2),
            "yesterday_sale" => round($yesterday_sale, 2),

            "this_week_sale" => round($this_week_sale, 2),
            "last_week_sale" => round($last_week_sale, 2),

            "total_profit" => round($total_profit, 2),
            "today_profit" => round($today_profit, 2),
            "yesterday_profit" => round($yesterday_profit, 2),
            "this_week_profit" => round($this_week_profit, 2),
            "last_week_profit" => round($last_week_profit, 2),
            "this_month_profit" => round($this_month_profit, 2),
            "this_year_profit" => round($this_year_profit, 2),
            "last_year_profit" => round($last_year_profit, 2),
            "last_month_profit" => round($last_month_profit, 2),


        ];
    }
}
