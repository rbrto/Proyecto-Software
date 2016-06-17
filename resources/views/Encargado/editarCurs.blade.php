@extends('Encargado.homeEncar')

@section('content')

     <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Editar Curso</h1>
                    <div class="panel-body">

              {!! Form::model($cursos, ['route' => ['encar.curs.modi.update', $cursos],'method' => 'PUT']) !!}

                    <form role="form">

                        <div class="form-group">

                         {!! Form::label('nombre', 'Pertenece a Asignatura: ') !!}
                         {!! Form::select('asignatura_id', $asignaturas) !!}
                        
                        </div>
                          <div class="form-group">

                         {!! Form::label('nombre', 'Pertenece a  Docente: ') !!}
                         {!! Form::select('docente_id', $docentes) !!}
                        
                        </div>
                      
                          <div class="form-group">
                           {!! Form::label('semestre', 'Semestre') !!}
                            {!! Form::text('semestre', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese el semestre']) !!}
                        </div>
                        <div class="form-group">
                           {!! Form::label('anio', 'Año') !!}
                            {!! Form::text('anio', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese el año']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('seccion', 'Seccion') !!}
                            {!! Form::text('seccion', null,['class' => 'form-control',
                             'placeholder' => 'Ingrese la seccion']) !!}
                        </div>
                           
                         <button type="submit" class="btn btn-info">Actualizar datos </button>
                         <a class="btn btn-danger" href="{{url('encar/curs/modi')}}" role="button">Cancelar</a>

                        
                    </form>
                       
                      {!! Form::close() !!}   

                 {!! Form::open(['route' => ['encar.curs.modi.destroy', $cursos], 'method' => 'DELETE']) !!}
                      
                    <button type="submit" onclick="return confirm('Seguro que desea eliminar el curso?')"
                   class="btn btn-danger">Eliminar </button>

                    {!! Form::close() !!}
            </div>  
          </div>
        </div>  
    </div>
</div>   

@endsection
