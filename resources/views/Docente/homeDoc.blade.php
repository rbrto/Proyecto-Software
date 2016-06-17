@extends('Docente.header')

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
                    {!! Html::image('/img/Logotipo_UTEM.png','logoTipo',['class'=>'navbar-brand']) !!}
                </div>

                <!-- Agrupar los enlaces de navegación, los formularios y cualquier
                     otro elemento que se pueda ocultar al minimizar la barra -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li>{!! Html::linkRoute('Docente.Asignatura.show','Mi horario',null,['class'=>'glyphicon glyphicon-list-alt']) !!}</li>
                        <li>{!! Html::linkRoute('Docente.Consulta.show','Solicitud',null,['class'=>'glyphicon glyphicon-send']) !!}</li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle glyphicon glyphicon-share-alt" data-toggle="dropdown">
                                Cambiar de perfil<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                {{--dd(Auth::user()->roles)--}}
                                @foreach(Auth::user()->roles as $perfiles)
                                    @if($perfiles->nombre == 'ADMINISTRADOR')
                                        <li>{!!Html::linkRoute('Admin.home.index','Administrador')!!}</li>
                                    @elseif($perfiles->nombre == 'ENCARGADO_CAMPUS')
                                        <li>{!!Html::linkRoute('encar.home.index','Encargado Campus')!!}</li>
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
        <div class="col-md-9">
            @yield('body')
        </div>
    </div>
</div>

@endsection