@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Departamento
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
                                        <a class="btn glyphicon glyphicon-plus" href="/Admin/Depto/create" role="button" aria-label="Left Align">Crear Departamento</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    {!!Form::open(['route'=>'Admin.Depto.index','method'=>'GET','class'=>'form-horizontal navbar-form navbar-right pull-right'])!!}
                                    {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre de Departamento'])!!}
                                    {!!Form::button('Buscar',['class' => 'btn btn-default','type' => 'submit'])!!}
                                    {!!Form::close()!!}
                                    {!!Html::linkRoute('Admin.Depto.index','Mostrar todo',[],['class'=>' form-control btn btn-default','role'=>'button'])!!}
                                </div>
                            </div>
                        </div>
                        @if(count($Departamentos)>0)
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th class="center">Nombre</th>
                                        <th class="center">Descripcion</th>
                                        <th class="center">Facultad perteneciente</th>
                                        <th class="center">Editar</th>
                                        <th class="center">Eliminar</th>
                                        <th class="center">Descargar</th>

                                    </tr>
                                    @foreach($Departamentos as $Departamento)
                                        <tr>
                                            <th class="center">{{$Departamento->nombre}}</th>
                                            <th class="center">{{$Departamento->descripcion}}</th>
                                            @foreach($Facultad as $key => $value)
                                                @if($key == $Departamento->facultad_id)
                                                    <th class="center">{{$value}}</th>
                                                @endif
                                            @endforeach
                                            <th class="center">
                                                <a class="btn glyphicon glyphicon-pencil" href="/Admin/Depto/{{$Departamento->id}}/edit" role="button" aria-label="Left Align"></a>
                                            </th>
                                            <th class="center">
                                                {!!Form::open(array('route' => array('Admin.Depto.destroy',$Departamento->id), 'method' => 'DELETE'))!!}

                                                <button class="btn glyphicon glyphicon-remove" type="submit"></button>

                                                {!!Form::close()!!}
                                            </th>
                                            <th>
                                                {!!Html::link('files/departamento/'.$Departamento->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                    @endforeach
                                    {!! $Departamentos->render() !!}
                                </table>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-9 col-xs-5 col-xs-offset-7">
                                        <nav class="navbar navbar-right">
                                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                                <tr><th class="center">Descargar Departamento(s)</th></tr>
                                                <tbody>
                                                <tr><th class="center">
                                                        {!!Html::link('files/departamentoall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
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
                                                <li>No hay Departamento(s) registrado(s)</li>
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