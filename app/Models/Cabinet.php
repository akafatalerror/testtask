<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    protected $table    = 'cabinets';
    protected $fillable = ['vk_id', 'name', 'user_id'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
