@extends('Encargado.homeEncar')

@section('content')


            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Crear Asignatura</h1>
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
                  
                   
            
                 {!! Form::open(['route' => 'encar.asig.modi.store', 'method' => 'POST']) !!}
                    <form role="form">            
                        <div class="form-group">
                           {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese el nombre']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('codigo', 'Codigo') !!}
                            {!! Form::text('codigo', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese codigo']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::text('descripcion', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese la descripcion']) !!}
                        </div>
                       
                         <div class="form-group"> 
                         {!! Form::label('departamento_id','Pertenece a departamento')!!}
                         {!! Form::select('departamento_id',$departamento)!!}
                         </div>
                        
                         <button type="submit" class="btn btn-info">Crear</button>
                         
                        
                         <a class="btn btn-danger" href="{{url('encar/asig/modi')}}" role="button">Cancelar
                         </a>

                      {!! Form::close() !!}
                      </form>
                      </div>
                      </div>
                      </div>

           
  <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-1">
                       <div class="panel panel-default">
                          <div class="panel-body">
                        {!!Form::open(['route' => 'files.AsigEncar.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
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
	@endsection