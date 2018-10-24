<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    //postulacion
    protected $table = 'postulacion';
    protected $fillable = ['otros_proyectos', 'aporte','actividad','estado','archivo', 'nombre_inv', 'id_post'];

    public function usuario(){
        return $this->belongsTo('App\User','user_id');
    }
    
}
