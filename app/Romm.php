<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Romm extends Model
{
    protected $fillable = [
        'id', 'name', 'status'
    ];
}
