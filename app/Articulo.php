<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
  public $timestamps = false;
  
  protected $fillable = [
       'tipo_articulo','titulo','autor','editorial','genero','costo','created_at'
    ];
}
