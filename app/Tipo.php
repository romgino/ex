<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    public function comprapedido()
    {
        return $this->belongsTo('App\Comprapedido');
    }

}
