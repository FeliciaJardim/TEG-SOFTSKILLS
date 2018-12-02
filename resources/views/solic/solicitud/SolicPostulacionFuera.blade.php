@include('header')
@extends('layouts.plantillaQpublic')
@section('content')

<div class="col-md-9 solicitudInv">
    @if(count($errors)>0)
        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Solicitud de Postulación') }}</div>
                    <div class="card-body">
                        {!!Form::open(['action' => 'PostulacionController@store', 'method' => 'POST', 'files'=> true, 'enctype' => 'multipart/form-data'])!!}
                            <input type="hidden" name="id_post" value="{{ $inv }}"> 
                            <input type="hidden" name="deafuera" value="1">
                            @csrf
                            <div class="form-group row">
                                {!! Form::label ('tituloinv','Titulo de la Postulación:')!!}
                                {!! Form::text ('tituloinv',null,['class'=>"form-control {{ $errors->has('tituloinv') ? ' is-invalid'}}",'placeholder'=>'Ingrese el Titulo de su postulación','required'])!!}
                                @if ($errors->has('tituloinv'))
                                        <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('tituloinv') }}</strong>
                                        </span>
                                @endif
                            </div>
                             <div class="form-group row">
                                    {!! Form::label ('otros_proyectos','Cuales proyectos has creado:')!!}
                                    {!! Form::text ('otros_proyectos',null,['class'=>"form-control {{ $errors->has('otros_proyectos') ? ' is-invalid'}}",'placeholder'=>'Escribe que otros proyectos has participado y creado','required'])!!}
                                    @if ($errors->has('otros_proyectos'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('otros_proyectos') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    {!! Form::label ('actividad','Actividad que deseas participar de la Investigación:  ')!!}
                                    {{-- <p>{{\App\Investigacion::find($inv)->actividades}}</p> --}}
                                    <ul class="form-control">
                                        @foreach(json_decode(\App\Investigacion::find($inv)->actividades) as $key=>$value)
                                            <li > <input type="radio" value="{{$value}}" name="actividad" id="actividad"> {{$value}}</li>
                                        @endforeach
                                    </ul>
                                    {{-- {!! Form::textarea ('actividad',null,['class'=>"form-control {{ $errors->has('actividad') ? ' is-invalid' : '' }}",'placeholder'=>'Escribe la actividad a desarrollar','required'])!!}
                                    @if ($errors->has('actividad'))
                                            <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('actividad') }}</strong>
                                            </span>
                                    @endif --}}
                                 </div>
                                <div class="form-group row">
                                        {!! Form::label ('aporte','Aportes:')!!}
                                        {!! Form::text ('aporte',null,['class'=>"form-control {{ $errors->has('aporte') ? ' is-invalid' : '' }}",'placeholder'=>'Cual seria tu aporte','required'])!!}
                                        @if ($errors->has('aporte'))
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $errors->first('aporte') }}</strong>
                                        </span>
                                        @endif
                                </div>                                    
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Subir Curriculum</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="archivo" >
                                    </div>
                                </div>
                                <h3>Ingresa tus datos de contacto:</h3>
                            <div class="form-group row">
                                {!! Form::label ('nombre','Su nombre:*')!!}
                                {!! Form::text ('nombre',null,['class'=>"form-control {{ $errors->has('nombre') ? ' is-invalid' }}",'placeholder'=>'Nombre','required'])!!}
                            </div>
                            <div class="form-group row">
                                {!! Form::label ('apellido','Su apellido:*')!!}
                                {!! Form::text ('apellido',null,['class'=>"form-control {{ $errors->has('nombre') ? ' is-invalid' }}",'placeholder'=>'Apellido','required'])!!}
                            </div>
                            <div class="form-group row">
                                {!! Form::label ('email','Email:*')!!}
                                {!! Form::email ('email',null,['class'=>"form-control {{ $errors->has('email') ? ' is-invalid' }}",'placeholder'=>'Email','required'])!!}
                            </div>
                            <div class="form-group row">
                                {!! Form::label ('telefono','Telefono')!!}
                                {!! Form::text ('telefono',null,['class'=>"form-control {{ $errors->has('telefono') ? ' is-invalid'}}",'placeholder'=>'Telefono'])!!}
                                @if ($errors->has('telefono'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                {!! Form::label ('otros','Otros medios de contacto:')!!}
                                {!! Form::textarea ('otros',null,['class'=>"form-control {{ $errors->has('otros') ? ' is-invalid' }}",'placeholder'=>'Indique otros medios por donde puede ser contactado'])!!}
                            </div>
                               <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary boton1">Enviar Postulación</button>
                                    </div>
                               </div>
                        {!!Form::close()!!}              
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection