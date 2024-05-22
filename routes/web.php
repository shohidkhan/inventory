<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\SupplierInvoiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//backend routea
Route::post("/userRegistration", [UserController::class, 'userRegistration']);
Route::post("/userLogin", [UserController::class, 'userLogin']);
Route::get("/userProfileDetail", [UserController::class, "userProfileDetail"])->middleware("auth:sanctum");
Route::get("/logout", [UserController::class, "logout"])->middleware("auth:sanctum");
Route::post("/updateProfile", [UserController::class, "updateProfile"])->middleware("auth:sanctum");
Route::post("/sendOtp", [UserController::class, "sendOtp"]);
Route::post("/verifyOtp", [UserController::class, "verifyOtp"]);
Route::post("/resetPassword", [UserController::class, "resetPassword"])->middleware("auth:sanctum");

//dashboard backend routes
Route::view("/dashboard", "pages.dashboard.dashboard-page");
Route::get("/summary", [DashboardController::class, "summary"])->middleware("auth:sanctum");

//user pages routes

Route::view("/", "pages.auth.login-page");
Route::view("/login", "pages.auth.login-page")->name("login");
Route::view("/registration", "pages.auth.registration-page");
Route::view("/userProfile", "pages.dashboard.profile-page");
Route::view("/send-otp", "pages.auth.send-otp-page");
Route::view("/verify-otp", "pages.auth.verify-otp-page");
Route::view("/reset-password", "pages.auth.reset-pass-page");

//category backend routes

Route::post("/create-category", [CategoryController::class, "createCatgory"])->middleware("auth:sanctum");
Route::get("/category-list", [CategoryController::class, "categoryList"])->middleware("auth:sanctum");
Route::post("/single-category", [CategoryController::class, "singleCategory"])->middleware("auth:sanctum");
Route::post("/update-category", [CategoryController::class, "updateCategory"])->middleware("auth:sanctum");
Route::post("/delete-category", [CategoryController::class, "deleteCategory"])->middleware("auth:sanctum");

//category frontend routes
Route::view("/category", "pages.dashboard.category-page");

//Brand Frontend Route
Route::view("/brand", "pages.dashboard.brand-page");
//Barnd Backend Routes
Route::post("/create-brand", [BrandController::class, "createBrand"])->middleware("auth:sanctum");
Route::get("/brand-list", [BrandController::class, "brandList"])->middleware("auth:sanctum");
Route::post("/single-brand", [BrandController::class, "singleBrand"])->middleware("auth:sanctum");
Route::put("/update-brand", [BrandController::class, "updateBrand"])->middleware("auth:sanctum");
Route::post("/delete-brand", [BrandController::class, "deleteBrand"])->middleware("auth:sanctum");

//product frontend routes
Route::view("/suppliers", "pages.dashboard.supplier-page");

//Supliers backend routes
Route::post("/create-suplier", [SuplierController::class, "createSuplier"])->middleware("auth:sanctum");
Route::get("/suplier-list", [SuplierController::class, "suplierList"])->middleware("auth:sanctum");
Route::post("/single-suplier", [SuplierController::class, "singleSuplier"])->middleware("auth:sanctum");
Route::put("/update-suplier", [SuplierController::class, "updateSuplier"])->middleware("auth:sanctum");
Route::post("/delete-suplier", [SuplierController::class, "deleteSuplier"])->middleware("auth:sanctum");

Route::view("/customer", "pages.dashboard.customer-page");
//customer  backend routes
Route::post("/create-customer", [CustomerController::class, "createCustomer"])->middleware("auth:sanctum");
Route::get("/customer-list", [CustomerController::class, "customerList"])->middleware("auth:sanctum");
Route::post("/single-customer", [CustomerController::class, "singleCustomer"])->middleware("auth:sanctum");
Route::post("/update-customer", [CustomerController::class, "updateCustomer"])->middleware("auth:sanctum");
Route::post("/delete-customer", [CustomerController::class, "deleteCustomer"])->middleware("auth:sanctum");

//customer page routes

//Product Backend routes
Route::post("/create-product", [ProductController::class, "createProduct"])->middleware("auth:sanctum");
Route::get("/product-list", [ProductController::class, "productList"])->middleware("auth:sanctum");
Route::post("/single-product", [ProductController::class, "singleProduct"])->middleware("auth:sanctum");
Route::post("/update-product", [ProductController::class, "updateProduct"])->middleware("auth:sanctum");
Route::post("/delete-product", [ProductController::class, "deleteProduct"])->middleware("auth:sanctum");

//product frontend routes
Route::view("/product", "pages.dashboard.product-page");

//sale frontend routes
Route::view("/sale", "pages.dashboard.sale-page");
//Invoice frontend routes
Route::view("/invoice", "pages.dashboard.invoice-page");

//invoice backend route

Route::post("/create-invoice", [InvoiceController::class, "createInvoice"])->middleware("auth:sanctum");
Route::get("/invoice-list", [InvoiceController::class, "invoiceList"])->middleware("auth:sanctum");
Route::post("/invoice-details", [InvoiceController::class, "invoiceDetails"])->middleware("auth:sanctum");
Route::post("/delete-invoice", [InvoiceController::class, "deleteInvoice"])->middleware("auth:sanctum");

//supplier invoice fronted routes
Route::get("/pruchase", [SupplierInvoiceController::class, "supplierPurchase"]);
Route::view("/purchase-invoice", "pages.dashboard.purchase-invoice-page");
//supplier backend routes
Route::post("/create-supplier-invoice", [SupplierInvoiceController::class, "createSupplierInvoice"])->middleware("auth:sanctum");

Route::get("/supplier-invoice-list", [SupplierInvoiceController::class, "supplierInvoiceList"])->middleware("auth:sanctum");

Route::post("/supplier-invoice-details", [SupplierInvoiceController::class, "supplierInvoiceDetails"])->middleware("auth:sanctum");

Route::post("/supplier-delete-invoice", [SupplierInvoiceController::class, "supplierDeleteInvoice"])->middleware("auth:sanctum");

///sales report
Route::view("/report", "pages.dashboard.report-page");

Route::get("/sales-report/{FromDate}/{ToDate}", [ReportController::class, "salesReport"])->middleware("auth:sanctum");

//prechase report
Route::view("/purchase-report", "pages.dashboard.purchase-report");
Route::get("/purchase-report/{FromDate}/{ToDate}", [ReportController::class, "purchaseReport"])->middleware("auth:sanctum");
