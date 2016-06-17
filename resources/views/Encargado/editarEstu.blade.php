@extends('Encargado.homeEncar')

@section('content')

     <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Editar Estudiante</h1>
                    <div class="panel-body">
                  
                {!! Form::model($estu, ['route' => ['encar.estu.modi.update', $estu],'method' => 'PUT']) !!}
                    <form role="form">            
                        <div class="form-group">

                         {!! Form::label('nombre', 'Carrera: ') !!}
                         {!! Form::select('carrera_id', $carre) !!}
                        
                        </div>
                         <div class="form-group">
                         {!! Form::label('nombres', 'Nombres') !!}
                         {!! Form::text('nombres',null,['class' => 'form-control',
                             'placeholder' => '$estu->nombres']) !!}
                        </div>
                           <div class="form-group">
                         {!! Form::label('apellidos', 'Apellidos') !!}
                         {!! Form::text('apellidos',null,['class' => 'form-control',
                             'placeholder' => '$estu->Apellidos']) !!}
                        </div>
                          <div class="form-group">
                         {!! Form::label('rut', 'Rut') !!}
                         {!! Form::text('rut',null,['class' => 'form-control',
                             'placeholder' => '$estu->rut']) !!}
                        </div>
                          <div class="form-group">
                         {!! Form::label('email', 'Email') !!}
                         {!! Form::text('email',null,['class' => 'form-control',
                             'placeholder' => '$estu->email']) !!}
                        </div>
                        
                        
                         <button type="submit" class="btn btn-info">Actualizar datos</button>
                         <a class="btn btn-danger" href="{{url('encar/estu/modi')}}" role="button">Cancelar
                         </a>

                      {!! Form::close() !!}
                      </form>
            
        {!! Form::open(['route' => ['encar.estu.modi.destroy', $estu], 'method' => 'DELETE']) !!}
                      
                    <button type="submit" onclick="return confirm('Seguro que desea eliminar el estudiante?')"
                   class="btn btn-danger">Eliminar </button>

                    {!! Form::close() !!}   
                      </div>  
                 </div>  
            </div>
        </div>
    </div>
@endsection