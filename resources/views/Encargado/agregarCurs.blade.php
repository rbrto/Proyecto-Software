@extends('Encargado.homeEncar')

@section('content')


            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Crear Curso</h1>
                    <div class="panel-body">
               
               @if(Session::has('message'))

        
          <div class="alert alert-dismissible alert-info">
           <strong>{{ Session::get('message') }}</strong>
          </div>

      @endif
      
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

                 {!! Form::open(['route' => 'encar.curs.modi.store', 'method' => 'POST']) !!}
                    <form role="form">
                        
                           <div class="form-group">

                         {!! Form::label('nombre', 'Pertenece a Asignatura: ') !!}
                         {!! Form::select('asignatura_id', $asignaturas) !!}
                        
                        </div>
                          <div class="form-group">

                         {!! Form::label('docente_id', 'Pertenece a  Docente: ') !!}
                         {!! Form::select('docente_id', $docentes) !!}
                        
                        </div>
                        
                       <div class="form-group">
                           {!! Form::label('semestre', 'Semestre') !!}
                          {!! Form::number('semestre','',['class' => 'form-control','min' => '1','max' => '2','placeholder' => 'Ingrese el semestre 1 o 2'])!!}
                        </div>
                        <div class="form-group">
                           {!! Form::label('anio', 'Año') !!}
                           {!! Form::number('anio','',['class' => 'form-control','min' => '2015','max' => '2018','placeholder' => 'Ingrese el año'])!!}

                        </div>
                         <div class="form-group">
                         {!! Form::label('seccion', 'Seccion') !!}
                            {!! Form::text('seccion', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese la seccion']) !!}
                        </div>

                           

                         <button type="submit" class="btn btn-info">Crear</button>
                         <a class="btn btn-danger" href="{{url('encar/curs/modi')}}" role="button">Cancelar</a>
                  
                      {!! Form::close() !!}
                       </form>
                          </div>
                      </div>
                      </div>
                      </div>
                      </div>

  <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-1">
                       <div class="panel panel-default">
                          <div class="panel-body">
                       <div class="col-md-6">
                        {!!Form::open(['route' => 'files.CursEncar.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
                        <div class="form-group">
                            {!!Form::label('file','Adjuntar archivo',['class' => 'col-md-6'])!!}
                            <br/>
                            <input type="file" name="file">

                        </div>
                        {!!Form::button('Enviar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>

@endsection