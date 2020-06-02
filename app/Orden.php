<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrdenesArticulos;

class Orden extends Model
{
    protected $fillable = [
       'codigo_orden','cliente_id','total','created_at','user_id'
    ];

    public function articulos(){
        return $this->hasMany(OrdenesArticulos::class);
    }
}
