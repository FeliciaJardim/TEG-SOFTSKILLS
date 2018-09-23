<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Solicitud extends Model
{
    //
    protected $table = 'solicitud';
    protected $fillable = ['nombre_solicitud', 'actividades','descripcion', 'titulo', 'caracteristica', 'asunto', 'mensaje', 'opinion', 'otros_proyectos', 'aporte', 'user_id'];

    public function usuario(){
        return $this->belongsTo('App\User','user_id');
    }

    public function setPathAttribute($path){
        $this->attributes['path'] = Carbon::now()->second.$path->getClientOriginalName();
        $name = Carbon::now()->second.$path->getClientOriginalName();
        \Storage::disk('local')->put($name, \File::get($path));
    }
}
