<?php

namespace App;
use App\Articulo;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Resenia extends Model
{
     protected $fillable = [
       'user_id','articulo_id','nombre_archivo'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }


}
