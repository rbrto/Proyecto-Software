@extends('Encargado.homeEncar')

@section('content')

     <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Editar Asignatura</h1>
                    <div class="panel-body">
                     @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                 <p>Complete los campos</p>
                    <ul>
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                          @endforeach
                      </ul>
                       </div>
                      @endif
                  
                {!! Form::model($asig, ['route' => ['encar.asig.modi.update', $asig],'method' => 'PUT']) !!}
                    <form role="form">            
                        <div class="form-group">

                         {!! Form::label('nombre', 'Pertenece al departamento: ') !!}
                         {!! Form::select('departamento_id', $depa) !!}
                        
                        </div>
                         <div class="form-group">
                         {!! Form::label('nombre', 'Nombre') !!}
                         {!! Form::text('nombre',null,['class' => 'form-control',
                             'placeholder' => '$asig->nombre']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('codigo', 'Codigo') !!}
                            {!! Form::text('codigo',null,['class' => 'form-control',
                             'placeholder' => '$asig->codigo']) !!}
                        </div>
                        <div class="form-group">
                         {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::text('descripcion',null,['class' => 'form-control',
                             'placeholder' => '$asig->descripcion']) !!}
                        </div>
                        
                        
                        
                         <button type="submit" class="btn btn-info">Actualizar datos</button>
                         
                         
                         <a class="btn btn-danger" href="{{url('encar/asig/modi')}}" role="button">Cancelar</a>

                      {!! Form::close() !!}
                      </form>
                  {!! Form::open(['route' => ['encar.asig.modi.destroy', $asig], 'method' => 'DELETE']) !!}
                      
                    <button type="submit" onclick="return confirm('Seguro que desea eliminar la asignatura?')"
                   class="btn btn-danger">Eliminar </button>

                    {!! Form::close() !!}    
                     </div>  
                </div>
            </div>
        </div>
    </div>
 
@endsection