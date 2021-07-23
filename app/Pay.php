<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $fillable=['order_id','class','user_id','class','price','payd_at'];

    public function work(){
        return $this->belongsTo(Work::class,'order_id');
    }
}