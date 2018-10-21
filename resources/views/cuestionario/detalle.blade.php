@extends('layouts.plantillaQ')

@section('content')
<div class="col-md-9 listaQuest">
  <div class="card">
      <div class="">
      <h2 class=""> {{ $cuestionario->titulo }}</h2>
      <p>
        {{ $cuestionario->description }}
      </p>
      <br/>
      <a href='ver/{{$cuestionario->id}}'>Responder cuestionario</a> | <a href="{{$cuestionario->id}}/editar">Editar cuestionario</a> | <a href="{{route('cuestionario.respuestas',$cuestionario->id)}}">Ver respuestas</a> <a href="#doDelete" data-toggle="modal" data-target="#doDelete" style="float:right;">Borrar cuestionario</a>
      <hr>
      <!-- Modal Structure -->
      <div id="doDelete" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Eliminar cuestionario</h4>     
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>                       
            </div>
            <div class="modal-body">
              <p>¿Seguro que deseas borrar el cuestionario "{{ $cuestionario->titulo }}"?</p>
            </div>
            <div class="modal-footer">
              <a href="/cuestionario/{{ $cuestionario->id }}/borrar" class="btn btn-danger" data-dismiss="modal">Eliminar</a>
              <a class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
            </div>
          </div>
        </div>
      </div>
      <div class="divider" style="margin:20px 0px;"></div>
      <h2 class="text-center">Añadir pregunta</h2>
      <form method="POST" action="{{ $cuestionario->id }}/preguntas" id="boolean" class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="">
            <select name="tipo_pregunta" id="tipo_pregunta" class="form-control">
              <option value="" disabled selected>Elija tipo de respuesta</option>
              <option value="text">Respuesta corta</option>
              <option value="textarea">Respuesta larga</option>
              <option value="checkbox">Selección Multiple</option>
              <option value="radio">Selección única</option>
            </select>
          </div>                
          <div class="">
            <label for="titulo">Pregunta</label>
            <input name="titulo" id="titulo" type="text" class="form-control">            
          </div>  
          <!-- this part will be chewed by script in init.js -->
          <span class="form-g"></span>

          <div class="">
          <button class="btn btn-primary">Guardar</button>
          </div>
      </form>
      <h2 class="text-center">Preguntas</h2>
      <ul class="card" data-collapsible="expandable">
          @forelse ($cuestionario->pregunta as $pregunta)
          <li style="box-shadow:none;">
          <div class="card-header">{{ $pregunta->titulo }} <a href="{{route('pregunta.editar',$pregunta->id)}}" style="float:right;">Editar</a></div>
            <div class="card-body">
              <div style="margin:5px; padding:10px;">
                  {!! Form::open() !!}
                    @if($pregunta->tipo_pregunta === 'text')
                      {{ Form::text('titulo')}}
                    @elseif($pregunta->tipo_pregunta === 'textarea')
                      <div class="row">
                        <div class="">
                          <textarea id="textarea1" class="materialize-textarea"></textarea>
                          <label for="textarea1">Provide answer</label>
                        </div>
                      </div>
                    @elseif($pregunta->tipo_pregunta === 'radio')
                      @foreach($pregunta->opcion as $key=>$value)
                        <p style="margin:0px; padding:0px;">
                          <input type="radio" id="{{ $key }}" />
                          <label for="{{ $key }}">{{ $value }}</label>
                        </p>
                      @endforeach
                    @elseif($pregunta->tipo_pregunta === 'checkbox')
                      @foreach($pregunta->opcion as $key=>$value)
                      <p style="margin:0px; padding:0px;">
                        <input type="checkbox" id="{{ $key }}" />
                        <label for="{{$key}}">{{ $value }}</label>
                      </p>
                      @endforeach
                    @endif 
                  {!! Form::close() !!}
              </div>
            </div>
          </li>
          @empty
            <span style="padding:10px;">Agrega preguntas</span>
          @endforelse
      </ul>
    </div>
  </div>    
</div>
@endsection