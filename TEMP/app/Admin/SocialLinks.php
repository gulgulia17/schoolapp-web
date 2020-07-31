<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class SocialLinks extends Model
{
    protected $fillable = [
        'icon', 'name', 'url',
    ];
}
