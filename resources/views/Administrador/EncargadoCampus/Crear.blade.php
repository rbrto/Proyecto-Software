@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            {!! Html::linkRoute('Admin.EncargadoCampus.index','Encargado Campus') !!}
            <a class="glyphicon glyphicon-menu-right"></a>
            Crear
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
                        @elseif(Session::has('alert'))
                            <div class="alert alert-warning">
                                <strong>OOpps!</strong><br><br>
                                <ul>
                                    <li>{{ Session::get('alert') }}</li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-xs-9">
                        {!!Form::open(['route' => 'Admin.EncargadoCampus.store','method' => 'POST','class'=>'form-vertical'])!!}
                        <div class="form-group">

                            {!!Form::label('nombres','Nombres',['class' => 'control-label'])!!}
                            {!!Form::text('nombres','',['class' => 'form-control'])!!}

                            {!!Form::label('apellidos','Apellidos',['class' => 'control-label'])!!}
                            {!!Form::text('apellidos','',['class' => 'form-control'])!!}

                            {!!Form::label('rut','RUT',['class' => 'control-label'])!!}
                            {!!Form::number('rut','',['class' => 'form-control','min'=> '1000000','max'=> '99999999', 'required'=>'required'])!!}

                            {!!Form::label('email','E-MAIL',['class' => 'control-label'])!!}
                            {!!Form::email('email','',['class' => 'form-control'])!!}

                        </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection