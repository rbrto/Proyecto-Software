@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Carrera
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="mensaje">
                        @if(Session::has('message'))
                            <div class="alert alert-info">
                                <strong>Execelente!</strong><br><br>
                                <ul>
                                    <li>{{ Session::get('message') }}</li>
                                </ul>
                            </div>
                        @elseif(Session::has('destroy'))
                            <div class="alert alert-danger">
                                <strong>Tus deseos son ordenes!</strong><br><br>
                                <ul>
                                    <li>{{ Session::get('destroy') }}</li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <nav class="navbar navbar-right">
                                <a class="btn glyphicon glyphicon-plus" href="/Admin/Carrera/create" role="button" aria-label="Left Align">Crear Carrera</a>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            {!!Form::open(['class'=>'form-horizontal','route'=>'Admin.Carrera.index','method'=>'GET','class'=>'navbar-form navbar-right pull-right'])!!}
                            {!!Form::text('Carrera',null,['class'=>'form-control','placeholder'=>'Nombre de la escuela'])!!}
                            {!!Form::button('Buscar',['class' => 'btn btn-default','type' => 'submit'])!!}
                            {!!Form::close()!!}
                            {!!Html::linkRoute('Admin.Carrera.index','Mostrar todo',null,['class'=>'btn btn-default form-control','role'=>'button'])!!}
                        </div>
                    </div>
                    @if(count($Carreras)>0)
                        <div class="table-responsive">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <tr>
                                    <th class="center">Nombres</th>
                                    <th class="center">Codigo</th>
                                    <th class="center">Escuela</th>
                                    <th class="center">Editar</th>
                                    <th class="center">Eliminar</th>
                                    <th class="center">Descargar</th>
                                </tr>
                                @foreach($Carreras as $carrera)
                                    <tr>
                                        <th class="center">{{$carrera->nombre}}</th>
                                        <th class="center">{{$carrera->codigo}}</th>
                                        <th class="center">{{$carrera->escuela->nombre}}</th>
                                        <th class="center">{!!Html::link('Admin/Carrera/'.$carrera->id.'/edit','',['class'=>'btn glyphicon glyphicon-pencil','role'=>'button', 'aria-label'=>'Left Align'])!!}</th>
                                        <th class="center">
                                            {!!Form::open(array('route' => array('Admin.Carrera.destroy',$carrera->id), 'method' => 'DELETE'))!!}
                                            {!!Form::button(null,['class'=>'btn glyphicon glyphicon-remove', 'type'=>'submit'])!!}
                                            {!!Form::close()!!}
                                        </th>
                                        <th class="center">
                                            {!!Html::link('files/carrera/'.$carrera->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                        </th>
                                    </tr>
                                @endforeach
                                {!! $Carreras->render() !!}
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-9 col-xs-5 col-xs-offset-7">
                                <nav class="navbar navbar-right">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">Descargar Carrera</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/carrerall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </nav>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-8 col-md-offset-4 col-xs-12">
                                <div class="alert alert-info">
                                    <strong>Execelente!</strong><br><br>
                                    <ul>
                                        <li>No hay Carrera(s) registradas</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
@endsection