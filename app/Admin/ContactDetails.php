<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    protected $fillable = [
        'address', 'phone', 'email', 'website',
    ];
}
