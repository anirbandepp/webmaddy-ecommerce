<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'path'
    ];

    public function productImages()
    {
        return $this->belongsToMany(
            Image::class,
            'products_images',
            'image_id',
            'product_id'
        )->withTimestamps();
    }
}
