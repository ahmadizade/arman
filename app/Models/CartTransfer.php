<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartTransfer extends Model
{
    use HasFactory;
    protected $table = "cart_transfer";
    protected $guarded = [];
    public $timestamps = false;

}
