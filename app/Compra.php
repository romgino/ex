<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public function tipo()
    {
        return $this->hasOne('App\Tipo','id','tipo_id');
    }
    public function comprapedido()
    {
        return $this->hasOne('App\Comprapedido','id','comprapedido_id');
    }
}
