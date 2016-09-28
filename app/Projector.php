<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projector extends Model
{
    protected $fillable = [
        'id', 'name', 'brand', 'model', 'patrimony' ,'dtaacquisition', 'status'
    ];

    public function reservas()
    {
        return $this->hasMany('App\Reserve');
    }
}
