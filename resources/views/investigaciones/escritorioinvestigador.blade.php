@extends('layouts.plantilla')

@section('content')
    @if(Auth::user()->sexo == "Femenino")
        <p>Bienvenida {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @else
        <p>Bienvenido {{Auth::user()->nombre ." ". Auth::user()->apellido}}</p>
    @endif
    <a href="{{route('solicinvestigacion')}}" class="btn btn-primary">Crear Solicitud</a>
    <p>Solicitudes creadas:</p>
    {{-- {{\App\Solicitud::all()}} --}}
    @if(count(\App\Solicitud::all())>0)
        @foreach(\App\Solicitud::all() as $sol)
            @if($sol->user_id == Auth::user()->id)
                <div class="solicitud">
                    <h3><a href="{{route('solicitud.show',['id'=> $sol->id])}}">{{$sol->titulo}}</a></h3>
                </div>
            @endif
        @endforeach
    @else
        <p>No hay solicitudes creadas</p>
    @endif
@endsection