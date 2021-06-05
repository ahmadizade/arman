<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }
    public function category()
    {
        return $this->belongsTo("App\Models\Category", "category_id", "id");
    }
    public function variety()
    {
        return $this->belongsTo("App\Models\Category_variety", "category_variety", "id");
    }
    public static function status($status){
        switch ($status){
            case '0':
                $result = "ندارد";
                break;
            case '1':
                $result = "دارد";
                break;
            default:
                $result = "ندارد";
        }
        return $result;
    }
}
