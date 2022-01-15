<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_variety extends Model
{
    use HasFactory;
    protected $table = "category_variety";
    protected $guarded = [];
    public $timestamps = false;
}
