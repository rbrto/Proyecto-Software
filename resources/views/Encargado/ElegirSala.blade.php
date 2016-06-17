@extends('Encargado.homeEncar')

@section('content')


 <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Asignar Sala</h1>
                    <div class="panel-body">

              <h2>{{$campus->nombre}}</h2>
              <h2>Cantidad de alumnos: {{$cantidad_alumno}}</h2>
              <h2>Seccion: {{$cursoo->seccion}}</h2>
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
         {!!Form::open(['route' => 'encar.asignar.modi.store', 'method' => 'POST'])!!}
                                
                               <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer"
                  <div class="panel-heading"></div>
                                    <div class="panel-body">
                                   </div>
                         <div class="form-group">
                         {!! Form::label('fecha','Ingrese la fecha de termino de semestre :  ')!!}
                         {!! Form::date('fecha', \Carbon\Carbon::now(),['max'=>'2015-8-3','min'=>'2016-1-1'])!!}
                          </div>
                          <div class="form-group">
                         {!! Form::label('dias','Seleccione los dias: ')!!}
                         </div>
                         <div class="form-group">
                         {!! Form::label('dias','Lunes')!!}
                         {!! Form::checkbox('dias[]',0,null,['class' => 'field'])!!}
                           {!! Form::label('dias','Martes')!!}
                         {!! Form::checkbox('dias[]',1,null,['class' => 'field'])!!}
                           {!! Form::label('dias','Miercoles')!!}
                         {!! Form::checkbox('dias[]',2,null,['class' => 'field'])!!}
                         {!! Form::label('dias','Jueves')!!}
                         {!! Form::checkbox('dias[]',3,null,['class' => 'field'])!!}
                                {!! Form::label('dias','Viernes')!!}
                         {!! Form::checkbox('dias[]',4,null,['class' => 'field'])!!}
                               {!! Form::label('dias','Sabado')!!}
                         {!! Form::checkbox('dias[]',5,null,['class' => 'field'])!!}
                         </div>
                         
                         <div class="form-group">
                         {!! Form::label('sala_id','Seleccione la sala')!!}
                         {!! Form::select('sala_id',$sa)!!}

                         </div>
                              <div class="form-group"> 
                         {!! Form::label('periodo_id','Periodo')!!}
                         {!! Form::select('periodo_id',['-1' => 'Selecciona un Período']+ $periodos)!!}
                         </div>
                         <div>
                         {!! Form::hidden('curso_id', $cursoo->id)!!}
                          
                         </div>
                         <div>  <button type="submit" class="btn btn-info">Asignar</button></div>
                                      
                                    </div>
                                    </div>
                                    </div>
                                  
{!!Form::close()!!}

            </div>  
          </div>
        </div>  
    </div>
</div>   
@endsection

