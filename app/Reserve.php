<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $fillable = [
        'id', 'id_user', 'id_romm', 'id_mic', 'id_proj' ,'id_not', 'id_sound', 'dtahini', 'dtahend'
    ];

    public function notebook()
    {
        return $this->belongsTo('App\Laptop');
    }

    public function microfone()
    {
        return $this->belongsTo('App\Microphone');
    }

    public function projetor()
    {
        return $this->belongsTo('App\Projector');
    }

    public function sala()
    {
        return $this->belongsTo('App\Romms');
    }

    public function som()
    {
        return $this->belongsTo('App\Sound');
    }

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }


}
