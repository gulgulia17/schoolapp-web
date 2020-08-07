<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    protected $fillable =[ 
        'name','desc','features','amount','status'
    ];
}
