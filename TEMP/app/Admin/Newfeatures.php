<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Newfeatures extends Model
{
    protected $fillable = [
        'name', 'desc', 'image',
    ];
}
