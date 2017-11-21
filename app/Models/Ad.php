<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vk;
use Cache;

class Ad extends Model
{

    protected $table = 'ads';
    protected $fillable = ['vk_id', 'comment'];

    public static function fields_info(){
        return \Config::get('ad.fields_info');
    }

    public static function process_timestamp($value) {
        return !empty($value)?date('d.m.Y H:i:s', $value):'Не задано';
    }


    public static function process_limit($value) {
        return (empty($value)?'Лимит не задан':$value);
    }

    public static function process_age_restriction($value) {
        return (empty($value)?'Лимит не задан':$value);
    }

    public static function process_kopecks($value) {
        return round($value/100,2).' руб.';
    }



}
