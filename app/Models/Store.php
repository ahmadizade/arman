<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = "store";
    protected $guarded = [];
    public $timestamps = false;

    public function report()
    {
        return $this->hasMany("App\Models\Report", "store_id", "id");
    }
    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }
}
