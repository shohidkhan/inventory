<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuplierInvoiceProduct extends Model {
    use HasFactory;
    protected $guarded = [];

    public function suplierInvoice() {
        return $this->belongsTo(SuplierInvoice::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    function brand() {
        return $this->belongsTo(Brand::class);
    }
}
