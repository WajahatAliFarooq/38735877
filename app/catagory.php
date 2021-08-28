<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catagory extends Model
{
    protected $guarded = [];
    public function products(){
        return $this->hasMany(customer::class);
    }
}
