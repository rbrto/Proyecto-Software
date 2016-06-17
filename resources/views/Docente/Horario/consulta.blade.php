@extends('Docente.homeDoc')

@section('body')

    <div class="panel panel-success">
        <div class="panel-body">
            Consulta
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-xs-12 col-md-offset-2">
                        @if(Session::has('message'))
                            <div class="alert alert-info">
                                <ul>
                                    <li>{{ Session::get('message') }}</li>
                                </ul>
                            </div>
                        @endif
                        {!!Form::open(['route' => 'Docente.peticion','method' => 'POST','class'=>'form-horizontal'])!!}
                        <div class="form-group">
                            {!!Form::label('periodo','Periodo',['class' => 'control-label'])!!}
                            {!!Form::select('periodo',$periodo,'',['class' => 'form-control'])!!}

                            {!!Form::label('sala','Sala',['class' => 'control-label'])!!}
                            {!!Form::select('sala',$salas,'',['class' => 'form-control'])!!}

                            {!!Form::label('fecha','Fecha',['class' => 'control-label'])!!}
                            <input type="time" name="timestamp" step="1">

                        </div>
                        {!!Form::button('consultar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection