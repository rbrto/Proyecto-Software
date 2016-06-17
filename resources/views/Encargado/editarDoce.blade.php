@extends('Encargado.homeEncar')

@section('content')

     <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Editar Docente</h1>
                    <div class="panel-body">
                  
                {!! Form::model($doce, ['route' => ['encar.doce.modi.update', $doce],'method' => 'PUT']) !!}
                    <form role="form">            
                        <div class="form-group">

                         {!! Form::label('departamento_id', 'Departamento: ') !!}
                         {!! Form::select('departamento_id', $depa) !!}
                        
                        </div>
                         <div class="form-group">
                         {!! Form::label('nombres', 'Nombres') !!}
                         {!! Form::text('nombres',null,['class' => 'form-control',
                             'placeholder' => '$doce->nombres']) !!}
                        </div>
                           <div class="form-group">
                         {!! Form::label('apellidos', 'Apellidos') !!}
                         {!! Form::text('apellidos',null,['class' => 'form-control',
                             'placeholder' => '$doce->Apellidos']) !!}
                        </div>
                          <div class="form-group">
                         {!! Form::label('rut', 'Rut') !!}
                         {!! Form::text('rut',null,['class' => 'form-control',
                             'placeholder' => '$doce->rut']) !!}
                        </div>
                                                
                        
                         <button type="submit" class="btn btn-info">Actualizar datos</button>
                         <a class="btn btn-danger" href="{{url('encar/doce/modi')}}" role="button">Cancelar
                         </a>

                      {!! Form::close() !!}
                      </form>
            
       {!! Form::open(['route' => ['encar.doce.modi.destroy', $doce], 'method' => 'DELETE']) !!}
                      
                    <button type="submit" onclick="return confirm('Seguro que desea eliminar el docente?')"
                   class="btn btn-danger">Eliminar </button>

                    {!! Form::close() !!}   
                      </div>  
                 </div>  
            </div>
        </div>
    </div>
@endsection