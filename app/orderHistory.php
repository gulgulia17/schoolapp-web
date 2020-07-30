<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderHistory extends Model
{
    protected $fillable =[
        'ORDERID','TXNID','TXNAMOUNT','PAYMENTMODE','TXNDATE','STATUS','RESPCODE','BANKNAME','name' ,'email' ,'phone' ,'subscription' 
    ];
}
