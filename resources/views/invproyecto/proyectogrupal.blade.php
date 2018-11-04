@extends('layouts.plantilla')

@section('content')
<div class="row text-center">
        <div class="col-md-8">
                <br><br>  
        <h2 style='margin-right:20px'>Investigaciones con sus investigadores</h2>
        <br>
        <div class="text-center">
            <b>Investigadores:</b>
        </div>  
        <hr>
        @forelse(\App\Investigacion::all() as $inv)
            @if($inv->user_id == Auth::user()->id)
           <strong> <span>{{$inv->titulo}}</span></strong>
            <hr>
            <div class="row"> 
                    <div class="col-md-3">
                        <b>Nombre</b>
                    </div>
                    <div class="col-md-3">
                        <b>Apellido</b>
                    </div>
                    <div class="col-md-3">
                        <b>Ver Contenido</b>
                    </div>
                </div>
                @forelse(\App\Postulacion::all() as $postulacion)
                    @if($postulacion->id_post == $inv->id)
                        
                        <div class="row">
                            <div class="col-md-3">
                                <span>{{\App\User::find($postulacion->id_invest)->nombre}}</span>
                            </div>
                            <div class="col-md-3">
                                <span>{{\App\User::find($postulacion->id_invest)->apellido}}</span>
                            </div>
                            <div class="col-md-3">
                                <a href="{{route('verPostulacion.show',['id'=> $postulacion->id])}}" class="btn btn-primary">Ver Más</a></h3>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach 
            @endif
        @endforeach
</div>
      
    <div class="col-md-3"> 
            <br>
        <a href="#" class="btn btn-warning" style='width:180px; height:130px'><i class="fa fa-book fa-8x"></i></a>
            <br><br>
        <a href="#" class="btn btn-success" style='width:180px; height:130px'><i class="fa fa-newspaper fa-8x"></i></a>
    </div>
</div>
@endsection