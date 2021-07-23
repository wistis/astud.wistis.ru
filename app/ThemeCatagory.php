<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThemeCatagory extends Model
{

    public function getthemes(){
        return $this->hasMany(Theme::class/*,'theme_catagory_id'*/);
    }
}
