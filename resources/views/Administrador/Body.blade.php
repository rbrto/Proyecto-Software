@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Bienvenido Administrador {{$user->nombres}}
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-xs-3">
                        {!! Html::image('/img/rector.jpg','rector',['class'=>'img-circle']) !!}
                    </div>
                    <div class="col-md-10 col-xs-12">
                        <em>
                            <br/>
                            Estimados/as Administrador,
                            Bienvenido al servicio de Consulta de salas, desarrollado por los estudiantes de
                            ingenieria en informatica de nuestra universidad. Estoy seguro que este será un espacio
                            de gran utilidad para ustedes.
                            <br/>
                            Aquí, en un solo lugar, podran crear diversos dependencias de nuestra universidad asi como
                            un encargado a cada campus, alumnos y docentes.
                            <br/>
                            Para nuestra Universidad podran crear campus, facultades, etc y asignarle los usuarios ya creados
                            por usted, GENIAL no ? ahora te pido que ocupes este espacio con responsabilidad, si estas calificadando
                            para un ramo te pido misericordia, que tengas un buen provecho con la aplicacion
                            Atentamente,

                            Luis Pinto Faverio Rector UTEM
                        </em>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection