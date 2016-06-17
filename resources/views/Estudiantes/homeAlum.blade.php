@extends('Estudiantes.header')

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
                      <li>{!!Html::linkRoute('estu.horario.index','Horario')!!}</li>
                </div>
               
                </div>
            </div>

        </div>
        <div class="col-md-9">

         @if($_SERVER['REQUEST_URI'] == "/estu/horario")
                @yield('content')
         @endif
         
        </div>
    </div>
</div>
@endsection

