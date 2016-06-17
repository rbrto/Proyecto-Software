@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            {!! Html::linkRoute('Admin.Estudiante.index','Estudiante') !!}
            <a class="glyphicon glyphicon-menu-right"></a>
            Editar
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>OOoops!</strong> Hubo algunos problemas con su entrada.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-xs-9">
                        {!! Form::model($estudiante,array('route' => array('Admin.Estudiante.update',$estudiante->id), 'class'=>'form-horizontal','method' => 'PUT')) !!}
                        <div class="form-group">

                            {!!Form::label('nombres','Nombres',['class' => 'control-label'])!!}
                            {!!Form::text('nombres',$estudiante->nombres,['class' => 'form-control'])!!}

                            {!!Form::label('apellidos','Apellidos',['class' => 'control-label'])!!}
                            {!!Form::text('apellidos',$estudiante->apellidos,['class' => 'form-control'])!!}

                            {!!Form::label('email','E-MAIL',['class' => 'control-label'])!!}
                            {!!Form::email('email',$estudiante->email,['class' => 'form-control'])!!}

                            {!!Form::label('carrera','Carrera',['class' => 'control-label'])!!}
                            {!!Form::select('carrera',$Carreras,$estudiante->carrera->id,['class' => 'form-control'])!!}

                        </div>
                        {!! Form::hidden('estudiante_rut',$estudiante->rut) !!}
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection