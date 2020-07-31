<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
   public function PuchaseRequest()
    {
       return $this->hasMany(PuchaseRequest::class);
    }
}
