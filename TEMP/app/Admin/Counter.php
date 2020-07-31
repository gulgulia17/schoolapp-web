<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $fillable = [
        'active', 'updates', 'mettings', 'facebookfans'
    ];
}
