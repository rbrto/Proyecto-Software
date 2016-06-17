@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Escuela
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
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
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <nav class="navbar navbar-right">
                                        <a class="btn glyphicon glyphicon-plus" href="/Admin/Escuela/create" role="button" aria-label="Left Align">Crear Escuela</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    {!!Form::open(['route'=>'Admin.Escuela.index','method'=>'GET','class'=>'form-horizontal navbar-form navbar-right pull-right'])!!}
                                    {!!Form::text('Escuela',null,['class'=>'form-control','placeholder'=>'Nombre de la escuela'])!!}
                                    {!!Form::button('Buscar',['class' => 'btn btn-default','type' => 'submit'])!!}
                                    {!!Form::close()!!}
                                    {!!Html::linkRoute('Admin.Escuela.index','Mostrar todo',null,['class'=>'form-control btn btn-default','role'=>'button'])!!}
                                </div>
                            </div>
                        </div>
                        @if(count($Escuelas) > 0)
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th class="center">Nombre</th>
                                        <th class="center">Descripcion</th>
                                        <th class="center">Departamento perteneciente</th>
                                        <th class="center">Editar</th>
                                        <th class="center">Eliminar</th>
                                        <th class="center">Descargar</th>
                                    </tr>
                                    @foreach($Escuelas as $Escuela)
                                        <tr>
                                            <th class="center">{{$Escuela->nombre}}</th>
                                            <th class="center">{{$Escuela->descripcion}}</th>
                                            <th class="center">{{$Escuela->departamento->nombre}}</th>
                                            <th class="center">
                                                <a class="btn glyphicon glyphicon-pencil" href="/Admin/Escuela/{{$Escuela->id}}/edit" role="button" aria-label="Left Align"></a>
                                            </th>
                                            <th class="center">
                                                {!!Form::open(array('route' => array('Admin.Escuela.destroy',$Escuela->id), 'method' => 'DELETE'))!!}

                                                <button class="btn glyphicon glyphicon-remove" type="submit"></button>

                                                {!!Form::close()!!}
                                            </th>
                                            <th class="center">
                                                {!!Html::link('files/escuela/'.$Escuela->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                    @endforeach
                                    {!! $Escuelas->render() !!}
                                </table>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-9 col-xs-5 col-xs-offset-7">
                                        <nav class="navbar navbar-right">
                                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                                <tr><th class="center">Descargar Escuela</th></tr>
                                                <tr>
                                                    <th class="center">
                                                        {!!Html::link('files/escuelall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                                    </th>
                                                </tr>
                                            </table>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-4 col-xs-12">
                                        <div class="alert alert-info">
                                            <strong>Execelente!</strong><br><br>
                                            <ul>
                                                <li>No hay Escuela(s) ingresada(s)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection