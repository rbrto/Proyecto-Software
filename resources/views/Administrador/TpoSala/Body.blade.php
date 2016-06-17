@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Tipo sala
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
                                <div class="col-md-12 col-xs-12">
                                    <nav class="navbar navbar-right">
                                        <a class="btn glyphicon glyphicon-plus" href="/Admin/TpoSala/create" role="button" aria-label="Left Align">
                                            Crear Tipo de sala
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    {!!Form::open(['route'=>'Admin.TpoSala.index','method'=>'GET','class'=>'form-horizontal navbar-form navbar-right pull-right'])!!}
                                    {!!Form::text('TpoSala',null,['class'=>'form-control','placeholder'=>'Nombre del Campus'])!!}
                                    {!!Form::button('Buscar',['class' => 'btn btn-default','type' => 'submit'])!!}
                                    {!!Form::close()!!}
                                    {!!Html::linkRoute('Admin.TpoSala.index','Mostrar todo',null,['class'=>' form-control btn btn-default','role'=>'button'])!!}
                                </div>
                            </div>
                        </div>
                        @if(count($Tposalas) > 0)
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th class="center">Nombre</th>
                                        <th class="center">Descripcion</th>
                                        <th class="center">Editar</th>
                                        <th class="center">Eliminar</th>
                                        <th class="center">Descargar</th>
                                    </tr>
                                    @foreach($Tposalas as $Tposala)
                                        <tr>
                                            <th class="center">{{$Tposala->nombre}}</th>
                                            <th class="center">{{$Tposala->descripcion}}</th>
                                            <th class="center">
                                                <a class="btn glyphicon glyphicon-pencil" href="TpoSala/{{$Tposala->id}}/edit" role="button" aria-label="Left Align"></a>
                                            </th>
                                            <th class="center">
                                                {!!Form::open(array('route' => array('Admin.TpoSala.destroy',$Tposala->id), 'method' => 'DELETE'))!!}

                                                <button class="btn glyphicon glyphicon-remove" type="submit"></button>

                                                {!!Form::close()!!}
                                            </th>
                                            <th class="center">
                                                {!!Html::link('files/tposala/'.$Tposala->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                    @endforeach
                                    {!! $Tposalas->render() !!}
                                </table>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-9 col-xs-5 col-xs-offset-7">
                                        <nav class="navbar navbar-right">
                                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th class="center">Descargar Tipo(s) de sala(s)</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th class="center">
                                                        {!!Html::link('files/tposalall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                                    </th>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2 col-xs-12">
                                        <div class="alert alert-info">
                                            <strong>Execelente!</strong><br><br>
                                            <ul>
                                                <li>No hay Tipo(s) sala(s) ingresada(s)</li>
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