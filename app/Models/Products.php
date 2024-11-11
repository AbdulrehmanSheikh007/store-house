<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Categories;
use App\Models\User;

class Products extends Model {

    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'created_by'
    ];

    public function categories() {
        return $this->belongsToMany(Categories::class, 'categories_products', 'product_id', 'category_id');
    }

    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

}
