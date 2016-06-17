@extends('Encargado.homeEncar')

@section('content9')

<!-- Page Content -->
        <div id="page-wrapper" style="min-height: 586px;">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Consultas Específicas</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                                           {{$campus->nombre}}                   



{!! Form::open(['route' => 'encar.hora.modi.store', 'method' => 'POST','id'=>'formularioeditar']) !!}

  
                         <div class="form-group">
                         {!! Form::label('fecha','Ingrese la fecha de termino de semestre :  ')!!}
                         {!! Form::date('fecha', \Carbon\Carbon::now(),['max'=>'2015-8-3','min'=>'2016-1-1'])!!}
                          </div>

                            <div class="form-group"> 
                         {!! Form::label('periodo_id','Periodos')!!}
                         {!! Form::select('periodo_id',$bloques)!!}
                         </div>

                        <div>  <button type="submit" class="btn btn-info">Consultar</button></div>

@stop
@endsection

@endsection