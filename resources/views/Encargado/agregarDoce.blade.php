@extends('Encargado.homeEncar')

@section('content')


            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-1">
                       <div class="panel panel-default">
                        <h1 class="page-header"> Crear Docente</h1>
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

                 {!! Form::open(['route' => 'encar.doce.modi.store', 'method' => 'POST']) !!}
                    <form role="form">            
                        <div class="form-group">
                           {!! Form::label('nombres', 'Nombres') !!}
                            {!! Form::text('nombres', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese nombres']) !!}
                        </div>
                         <div class="form-group">
                         {!! Form::label('apellidos', 'Apellidos') !!}
                            {!! Form::text('apellidos', '',['class' => 'form-control',
                             'placeholder' => 'Ingrese apellidos']) !!}
                        </div>
                         <div class="form-group">
                         {!!Form::label('rut','RUT',['class' => 'control-label'])!!}
                            {!!Form::number('rut','',['class' => 'form-control','min'=> '1000000','max'=> '99999999', 'required'=>'required','placeholder' => 'Ingrese el rut sin puntos ni comas'])!!}
                        
                        </div>
                         <div class="form-group"> 
                          {!!Form::label('email','E-MAIL',['class' => 'control-label'])!!}
                            {!!Form::email('email','',['class' => 'form-control','placeholder' => 'ejemplo@gmail.com'])!!}
                        </div>               
                         <div class="form-group"> 
                         {!! Form::label('departamento_id','Departamento')!!}
                         {!! Form::select('departamento_id',$depa)!!}
                         </div>
                        
                         <button type="submit" class="btn btn-info">Crear</button>
                     
                         <a class="btn btn-danger" href="{{url('encar/doce/modi')}}" role="button">Cancelar
                         </a>

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
                        {!!Form::open(['route' => 'files.DoceEncar.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
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