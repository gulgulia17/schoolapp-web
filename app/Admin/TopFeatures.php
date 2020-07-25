<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class TopFeatures extends Model
{
    protected $fillable = [
        'title', 'description', 'image'
    ];
}
