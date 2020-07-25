<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name', 'work', 'testimonial', 'logo',
    ];
}
