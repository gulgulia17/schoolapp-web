<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function district()
    {
       return $this->hasMany(District::class);
    }
}
