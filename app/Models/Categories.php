<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model {

    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function products() {
        return $this->belongsToMany(Products::class, 'categories_products', 'category_id', 'product_id');
    }

}
