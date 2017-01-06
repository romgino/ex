<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprapedido extends Model
{
    public function tipo()
    {
        return $this->hasOne('App\Tipo','id','tipo_id');
    }
    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
