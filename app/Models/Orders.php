<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }

    public function product()
    {
        return $this->hasMany("App\Models\Product", "id", "product_id");
    }



    public static function status($status){
        switch ($status){
            case '0':
                $result = "پرداخت نشده";
                break;
            case '1':
                $result = "پرداخت شده";
                break;
            case '2':
                $result = "رایگان";
                break;
            default:
                $result = "پرداخت نشده";
        }
        return $result;
    }
}
