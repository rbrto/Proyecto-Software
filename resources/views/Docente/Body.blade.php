@extends('Docente.homeDoc')

@section('body')

    <div class="panel panel-success">
        <div class="panel-body">
            Bienvenido Docente {{$user->nombres}}
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-2">
                    {!! Html::image('/img/rector.jpg','rector',['class'=>'img-circle']) !!}
                </div>
                <div class="col-md-10">
                    <em>
                        <br/>
                        Estimados/as Docente,
                        Bienvenido al servicio de Consulta de salas, desarrollado por los estudiantes de
                        ingenieria en informatica de nuestra universidad. Estoy seguro que este será un espacio
                        de gran utilidad para ustedes.
                        <br/>
                        Aquí, en un solo lugar, podram ver sus horarios para que asistan A SUS CLASES y para mayor comodida
                        les indicamos las salas en la cual tienen que dictar la clase, para que no se pierdan.
                        <br/>
                        Luis Pinto Faverio Rector UTEM
                    </em>
                </div>
            </div>
        </div>
    </div>

@endsection