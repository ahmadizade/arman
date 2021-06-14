<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blog";
    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }
}
