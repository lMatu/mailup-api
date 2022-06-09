<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
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
        'description'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    //Dependiendo la pregunta hecha en productos

    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}
