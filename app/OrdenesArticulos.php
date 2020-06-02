<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Orden;
use App\Articulo;

class OrdenesArticulos extends Model
{

    public $timestamps = false;
    protected $fillable = [
       'orden_id','articulo_id','cantidad'
    ];

    public function orden()
    {
        return $this->belongsTo(Orden::class, 'orden_id');
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }
}
