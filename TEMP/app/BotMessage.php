<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BotMessage extends Model
{
    protected $fillable = [
        'question', 'reply'
    ];
}
