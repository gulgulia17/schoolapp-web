<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Gretting extends Model
{
    protected $fillable = [
        'shortdescription',    'longdescription',
    ];
}
