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

            $field_name = isset($field_info[$name]['name'])?$field_info[$name]['name']:$name;

            if( isset($field_info[$name]['callback']) ){
                $field_value = Ad::{$field_info[$name]['callback']}($value);
            } elseif( isset($field_info[$name]['values'][$value]) ) {
                $field_value = $field_info[$name]['values'][$value];
            } else {
                $field_value = $value;
            }

            return[
                'name'    => $field_name,
                'value'   => $field_value,
                'comment' => @$field_info[$name]['comment']
            ];

        }

        return ['name' => $name, 'value' => $value];
    }
}
