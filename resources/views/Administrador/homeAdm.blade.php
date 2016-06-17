@extends('Administrador.header')

@section('content') <!-- EN ESTA SECCION VAMOS A MOSTRAR UNA BARRA LATERAL IZQUIERDA -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <!-- MENU -->


            <nav class="navbar navbar-default" role="navigation">
                <!-- El logotipo y el icono que despliega el menú se agrupan
                     para mostrarlos mejor en los dispositivos móviles -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Desplegar navegación</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--<a class="navbar-brand" href="#">Logotipo</a>-->
                    {!! Html::image('/img/Logotipo_UTEM.png','logoTipo',['class'=>'navbar-brand']) !!}
                </div>

                <!-- Agrupar los enlaces de navegación, los formularios y cualquier
                     otro elemento que se pueda ocultar al minimizar la barra -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-education" data-toggle="dropdown">
                                Universidad<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>{!!Html::linkRoute('Admin.Campus.index','Campus')!!}</li>
                                <li>{!!Html::linkRoute('Admin.Facultad.index','Facultad')!!}</li>
                                <li>{!!Html::linkRoute('Admin.Depto.index','Departamento')!!}</li>
                                <li>{!!Html::linkRoute('Admin.Escuela.index','Escuela')!!}</li>
                                <li>{!!Html::linkRoute('Admin.Carrera.index','Carrera')!!}</li>
                                <li>{!!Html::linkRoute('Admin.TpoSala.index','Tipos de sala')!!}</li>
                                <li>{!!Html::linkRoute('Admin.Salas.index','Salas')!!}</li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown">
                                Crear usuarios<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>{!!Html::linkRoute('Admin.Administrador.index','Administrador')!!}</li>
                                <li>{!!Html::linkRoute('Admin.EncargadoCampus.index','Encargado')!!}</li>
                                <li>{!!Html::linkRoute('Admin.Estudiante.index','Estudiante')!!}</li>
                                <li>{!!Html::linkRoute('Admin.Docente.index','Docente')!!}</li>
                                <li>{!!Html::linkRoute('Admin.Funcionario.index','Funcionario')!!}</li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-share-alt" data-toggle="dropdown">
                                Cambio Perfil<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                {{--dd(Auth::user()->roles)--}}
                                @foreach(Auth::user()->roles as $perfiles)
                                    @if($perfiles->nombre == 'ENCARGADO_CAMPUS')
                                        <li>{!!Html::linkRoute('encar.home.index','Encargado Campus')!!}</li>
                                    @elseif($perfiles->nombre == 'DOCENTE')
                                        <li>{!!Html::linkRoute('Docente.home.index','Docente')!!}</li>
                                    @elseif($perfiles->nombre == 'ESTUDIANTE')
                                        <li>{!!Html::linkRoute('estu.home.index','Estudiante')!!}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>

        </div>
        <div class="container-fluid">
            <div class="col-md-9 col-xs-12">
                @yield('body')
            </div>
        </div>
        {{--
        <div class="col-md-9">
            @if(strpos($_SERVER['REQUEST_URI'],'?') !== false || strpos($_SERVER['REQUEST_URI'],'/?page') !== false ||$_SERVER['REQUEST_URI'] ==  "/Admin/Funcionario" || $_SERVER['REQUEST_URI'] ==  "/Admin/Docente" || $_SERVER['REQUEST_URI'] ==  "/Admin/Estudiante" || $_SERVER['REQUEST_URI'] ==  "/Admin/EncargadoCampus" || $_SERVER['REQUEST_URI'] ==  "/Admin/Administrador" || $_SERVER['REQUEST_URI'] ==  "/Admin/Carrera"  || $_SERVER['REQUEST_URI'] == "/Admin/Salas" || $_SERVER['REQUEST_URI'] == "/Admin/TpoSala" || $_SERVER['REQUEST_URI'] == "/Admin/Escuela" || $_SERVER['REQUEST_URI'] == "/Admin/Depto" || $_SERVER['REQUEST_URI'] == "/Admin/Campus" || $_SERVER['REQUEST_URI'] == "/Admin/Facultad")
                @yield('body')
            @elseif(strpos($_SERVER['REQUEST_URI'],'/create') !== false)
                @yield('createBody')
            @elseif(strpos($_SERVER['REQUEST_URI'],'/edit') !== false)
                @yield('editBody')
            @elseif($_SERVER['REQUEST_URI']=="/Admin/home")
                @if(Auth::user()->nombres == null)
                    <div class="panel panel-success">
                        <div class="panel-body">
                            home
                            <a class="glyphicon glyphicon-menu-right"></a>
                            Datos Personales
                        </div>
                        <div class="panel-footer">
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
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::model(null,array('route' => array('Admin.home.update',Auth::user()->rut), 'method' => 'put')) !!}
                                    <div class="form-group">

                                        {!!Form::label('nombres','Nombres',['class' => 'col-md-6'])!!}
                                        {!!Form::text('nombres',null,['class' => 'col-md-6'])!!}

                                        {!!Form::label('apellidos','Apellidos',['class' => 'col-md-6'])!!}
                                        {!!Form::text('apellidos',null,['class' => 'col-md-6'])!!}

                                        {!!Form::label('email','E-mail',['class' => 'col-md-6'])!!}
                                        {!!Form::text('email',null,['class' => 'col-md-6'])!!}

                                    </div>
                                    {!!Form::button('Enviar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="panel panel-success">
                        <div class="panel-body">
                            home
                            <a class="glyphicon glyphicon-menu-right"></a>
                            Bienvenida
                        </div>
                        <div class="panel-footer">
                            te damos la bienvenida
                        </div>
                    </div>
                @endif

            @endif

        </div>
    </div>
</div>--}}

@endsection