<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCodeModel extends Model
{
    use HasFactory;

    protected $table = "promocodes";

    protected $fillable = [
        "promocode",
        "expire_from",
        "expire_to",
        "type",
        "promo_apply_id"
    ];
}
