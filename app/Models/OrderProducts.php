<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;
    protected $table = "order_products";
    protected $guarded = [];
    public $timestamps = false;

    public function WhichOrder()
    {
        return $this->belongsTo("App\Models\Orders", "order_id", "id");
    }

}
