<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $table = "bookmark";
    protected $guarded = [];
    public $timestamps = false;

    public function store(){

        return $this->hasOne('App\Models\Store',"id","store_id");

    }

}
