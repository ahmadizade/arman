<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{
    use HasFactory;
    protected $table = "accounting";
    protected $guarded = [];
    public $timestamps = false;

    public function webservice()
    {
        return $this->belongsTo("App\Models\Product", "api_id", "id");
    }

}
