<?php

namespace App\Models\Product;

use App\Models\Category\CategorySubModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        "category_id",
        "title",
        "short_description",
        "description",
        "price",
        "availability",
        "stocks",
        "image",
        "offer_percentage"
    ];

    public function category()
    {
        return $this->belongsTo(CategorySubModel::class, 'category_id');
    }

    public function CategoryRelationWithProduct()
    {
        return $this->belongsToMany(
            CategorySubModel::class,
            'category_products',
            'product_id',
            'category_id'
        )->withTimestamps();
    }

    public function productBelongsToCategories()
    {
        return $this->belongsToMany(
            CategorySubModel::class,
            'category_products',
            'product_id',
            'category_id'
        )->withTimestamps();
    }

    public function productImages()
    {
        return $this->belongsToMany(
            Image::class,
            'products_images',
            'product_id',
            'image_id'
        )->withTimestamps();
    }
}
