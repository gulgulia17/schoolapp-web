<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    protected $fillable = [
        'name', 'email', 'school', 'state_id', 'district_id', 'logo','phone'
    ];
    
    public function state()
   {
      return $this->belongsTo(State::class);
   }
   public function district()
   {
      return $this->belongsTo(District::class);
   }
}
