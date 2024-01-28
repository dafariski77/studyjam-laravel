<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // membuat relasi antara tabel product dan category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
