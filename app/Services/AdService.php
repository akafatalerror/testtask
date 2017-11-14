<?php

namespace App\Services;

use App\Models\Ad;

class AdService
{
    public static function proccess_ad_name($name, $value)
    {
        $field_info = Ad::fields_info();


        if( isset($field_info[$name]) && !is_array($field_info[$name])){
            return [
                'name'  => @$field_info[$name],
                'value' => $value
            ];
        } else if( isset($field_info[$name]) && is_array($field_info[$name])){

            return[
                'name'    => isset($field_info[$name]['name'])?$field_info[$name]['name']:$name,
                'value'   => isset($field_info[$name]['values'][$value])?$field_info[$name]['values'][$value]:$value,
                'comment' => @$field_info[$name]['comment']
            ];

        }

        return ['name' => $name, 'value' => $value];
    }
}
