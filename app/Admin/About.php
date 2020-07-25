<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'shortdescription', 'slogan', 'longdescription',
    ];
}
