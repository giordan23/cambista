<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = ['origin_price', 'actual_price_compra', 'actual_price_venta', 'modificador_compra', 'modificador_venta'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
