<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'ticket';
    protected $guarded = [];

    public static function Status($status){
        switch ($status){
            case '1':
                $result = "در انتظار پاسخ";
                break;
            case '2':
                $result = "پاسخ داده شده";
                break;
            case '3':
                $result = "بسته شده";
                break;
            default:
                $result = "در انتظار پاسخ";
        }
        return $result;
    }

    public static function Unit($unit){
        switch ($unit){
            case '1':
                $result = "پشتیبانی فنی";
                break;
            case '2':
                $result = "پشتیبانی فروش";
                break;
            case '3':
                $result = "مدیریت";
                break;
            default:
                $result = "نامعلوم";
        }
        return $result;
    }

    public static function Priority($priority){
        switch ($priority){
            case '1':
                $result = "زیاد";
                break;
            case '2':
                $result = "متوسط";
                break;
            case '3':
                $result = "کم";
                break;
            default:
                $result = "نامعلوم";
        }
        return $result;
    }

    function children(){
        return $this->hasMany(Ticket::class, 'parent_id');
    }
    function uFiles(){
        return $this->hasMany(FileUpload::class, 'table_id')->where('table', 'ticket');
    }
}
