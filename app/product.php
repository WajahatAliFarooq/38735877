<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $guarded = [];
    public function brand(){
        return $this->belongsto(brand::class);
    }
    public function category(){
        return $this->belongsto(catagory::class);
    }
}
