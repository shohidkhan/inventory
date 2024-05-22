<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $fillable = ['name', 'price', "buying_price", 'category_id', 'unit', 'img_url', "user_id", "stock", "brand_id", "suplier_id"];

    function category() {
        return $this->belongsTo(Category::class);
    }

    function suplier() {
        return $this->belongsTo(Suplier::class);
    }
    function invoiceProducts() {
        return $this->hasMany(InvoiceProduct::class);
    }

    function brand() {
        return $this->belongsTo(Brand::class);
    }
}
