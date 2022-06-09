<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        //'brand_id',
        'price',
        'price_sale',
        'category_id',
        'stock'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Preguntar si es una categoria dentro de la marca (creo que es lo logico)
    //O una categoria a nivel general de los productos

    // public function brand()
    // {
    //     return $this->belongsTo(Brand::class);
    // }


}
