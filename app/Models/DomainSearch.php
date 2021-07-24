<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainSearch extends Model
{
    use HasFactory;
    protected $table = "domain_search";
    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }
}
