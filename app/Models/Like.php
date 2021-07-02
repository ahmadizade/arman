<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = "like";
    protected $guarded = [];
    public $timestamps = false;

    public function product(){
        return $this->hasOne('App\Models\product',"id","product_id");
    }
}
