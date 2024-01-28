<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // agar bisa menggunakan create() atau mass assigment, kita perlu menentukan guarded atau fillable attribute
    protected $guarded = ['id'];
}
