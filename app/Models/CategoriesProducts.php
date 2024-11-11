<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CategoriesProducts extends Model {

    use HasFactory,
        SoftDeletes;

    protected $table = 'categories_products';
    protected $fillable = [
        'product_id',
        'category_id'
    ];
    public $timestamps = false;

}
