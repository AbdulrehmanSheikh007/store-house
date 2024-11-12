<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyTotalArchives extends Model {

    use HasFactory,
        SoftDeletes;

    protected $table = 'total_archives';
    protected $fillable = [
        'total_products',
        'total_categories',
        'total_users',
    ];

}
