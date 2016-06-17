@extends('Encargado.homeEncar')

@section('content')

<div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                       <div class="panel panel-default">
                       
                        <h1 class="page-header">Asignar estudiante</h1>
                    <div class="panel-body">

                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                 <p>Complete los campos</p>
                    <ul>
                    @foreach($errors->all() as $Error)
                    <li>{{$Error}}</li>
                    @endforeach
                    </ul>
                    </div>
                    if(Session::has('mesagge'))
                        <div class="alert alert-warning">
                            <strong>OOpps!</strong><br><br>
                            <ul>
                                <li>{{ Session::get('mesagge') }}</li>
                            </ul>
                        </div>
                   
                    @endif
 {!!Form::open(['route' => 'encar.cursadas.modi.store', 'method' => 'POST'])!!}
                                
                               <div id="dataTables-example_wrapper" 
                                class="dataTables_wrapper form-inline dt-bootstrap no-footer"
                  <div class="panel-heading"></div>
                                    <div class="panel-body">
                                   </div>
                         <div class="form-group">
                  {!!Form::label('rut','RUT',['class' => 'control-label'])!!}
                  {!!Form::number('rut','',['class' => 'form-control','min'=> '1000000','max'=> '99999999', 'required'=>'required','placeholder' => 'Ingrese el rut sin puntos ni comas'])!!}
                        </div>
                         <div>
                         {!! Form::hidden('curso_id', $curso->id)!!}
                          
                         </div>
                         <div>  <button type="submit" class="btn btn-info">Asignar</button></div>
                                      

                                    </div>
                                    
                                    
                                  
{!!Form::close()!!}
</div>
</div>



 
              <div class="container">
                <div class="row">
         
                    <div class="col-md-10 col-md-offset-1">
                       <div class="panel panel-default">
                           <h1 class="page-header">Asignar estudiantes</h1>
                        {!!Form::open(['route' => 'files.AsigCursEncar.up','method' => 'POST','enctype' =>'multipart/form-data'])!!}
                        <div class="form-group">
                            {!!Form::label('file','Adjuntar archivo',['class' => 'col-md-6'])!!}
                            {!! Form::hidden('curso_id', $curso->id)!!}
                           
                            <input type="file" name="file">

                      
                        {!!Form::button('Subir',['class' => 'btn btn-danger col-md-2 col-md-offset-4','type' => 'submit'])!!}
                          <br/>
                        {!!Form::close()!!}
                      </div>
                       </div>
                         </div>

@endsection