<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'name', 'email', 'subject', 'message', 'logo', 'ticket', 'phone'
    ];
}
