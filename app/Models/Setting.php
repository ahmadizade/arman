<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = "setting";
    protected $guarded = [];
    public $timestamps = false;

    public static function Month(){
        $Month =[
            'January' => 'فروردین',
            'February' => 'اردیبهشت',
            'March' => 'خرداد',
            'April' => 'تیر',
            'May' => 'مرداد',
            'June' => 'شهریور',
            'July' => 'مهر',
            'August' => 'آبان',
            'September' => 'آذر',
            'October' => 'دی',
            'November' => 'بهمن',
            'December' => 'اسفند',
        ];
        return $Month;
    }

}
