<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Due extends Model {
    use HasFactory;

    protected $guarded = [];

    function customer() {
        return $this->belongsTo(Customer::class);
    }

    function invoice() {
        return $this->belongsTo(Invoice::class);
    }
}
