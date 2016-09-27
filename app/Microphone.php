<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Microphone extends Model
{
    protected $fillable = [
        'id', 'name', 'brand', 'model', 'patrimony' ,'dtaacquisition', 'status'
    ];
}
