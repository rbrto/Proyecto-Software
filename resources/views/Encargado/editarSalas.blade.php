@extends('Encargado.header')

@section('content')

     <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Editar Salas</h1>
                    <div class="panel-body">
                 
                  
                {!! Form::model($sala, ['route' => ['encar.salas.modi.update', $sala],'method' => 'PUT']) !!}
                    <form role="form">            
                        <div class="form-group">

                         {!! Form::label('nombre', 'Tipo de sala: ') !!}
                         {!! Form::select('tipo_sala_id', $tipo_sala) !!}
                        
                        </div>
                           <div class="form-group">

                         {!! Form::label('nombre', 'Pertenece a Campus: ') !!}
                         {!! Form::select('campus_id', $campus) !!}
                        
                        </div>
                         <div class="form-group">
                         {!! Form::label('nombre', 'Nombre') !!}
                         {!! Form::text('nombre',null,['class' => 'form-control',
                             'placeholder' => '$sala->nombre']) !!}
                        </div>
                        <div class="form-group">
                         {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::textarea('descripcion',null,['class' => 'form-control',
                             'placeholder' => '$sala->descripcion']) !!}
                        </div>
                        <div class="form-group">
                         {!! Form::label('capacidad', 'Capacidad') !!}
                            {!! Form::text('capacidad',null,['class' => 'form-control',
                             'placeholder' => '$sala->capacidad']) !!}
                        </div>
                        
                        
                        
                         <button type="submit" class="btn btn-info">Actualizar datos</button>
                         
                         
                         <a class="btn btn-danger" href="{{url('encar/salas/modi')}}" role="button">Cancelar</a>

                      {!! Form::close() !!}
                      </form>
                  {!! Form::open(['route' => ['encar.salas.modi.destroy', $sala], 'method' => 'DELETE']) !!}
                      
                    <button type="submit" onclick="return confirm('¿Seguro que desea eliminar la sala?')"
                   class="btn btn-danger">Eliminar </button>

                    {!! Form::close() !!}   
                     </div>  
                </div>
            </div>
        </div>
    </div>
 
@endsection