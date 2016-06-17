@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Funcionario
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
                                        <a class="btn glyphicon glyphicon-plus" href="/Admin/Funcionario/create" role="button" aria-label="Left Align">Crear Funcionario</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    {!!Form::open(['route'=>'Admin.Funcionario.index','method'=>'GET','class'=>'form-horizontal navbar-form navbar-right pull-right'])!!}
                                    {!!Form::text('rut',null,['class'=>'form-control','placeholder'=>'Nombre del Campus'])!!}
                                    {!!Form::button('Buscar',['class' => 'btn btn-default','type' => 'submit'])!!}
                                    {!!Form::close()!!}
                                    {!!Html::linkRoute('Admin.Funcionario.index','Mostrar todo',null,['class'=>'form-control btn btn-default','role'=>'button'])!!}
                                </div>
                            </div>
                        </div>
                        @if(count($Funcionarios) > 0)
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th class="center">Nombres</th>
                                        <th class="center">RUT</th>
                                        <th class="center">email</th>
                                        <th class="center">Departamento</th>
                                        <th class="center">Editar</th>
                                        <th class="center">Eliminar</th>
                                        <th class="center">Descargar</th>
                                    </tr>
                                    @foreach($Funcionarios as $funcionario)
                                        <tr>
                                            <th class="center">{{$funcionario->apellidos.','.$funcionario->nombres}}</th>
                                            <th class="center">{{$funcionario->rut}}</th>
                                            <th class="center">{{$funcionario->email}}</th>
                                            <th class="center">{{$funcionario->departamento->nombre}}</th>
                                            <th class="center">{!!Html::link('Admin/Funcionario/'.$funcionario->id.'/edit','',['class'=>'btn glyphicon glyphicon-pencil','role'=>'button', 'aria-label'=>'Left Align'])!!}</th>
                                            <th class="center">
                                                {!!Form::open(array('route' => array('Admin.Funcionario.destroy',$funcionario->id), 'method' => 'DELETE'))!!}
                                                {!!Form::button(null,['class'=>'btn glyphicon glyphicon-remove', 'type'=>'submit'])!!}
                                                {!!Form::close()!!}
                                            </th>
                                            <th class="center">
                                                {!!Html::link('files/funcionario/'.$funcionario->id,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                    @endforeach
                                    {!! $Funcionarios->render() !!}
                                </table>
                            </div>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-9 col-xs-5 col-xs-offset-7">
                                        <nav class="navbar navbar-right">
                                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                                <tr><th class="center">Descargar Usuario</th></tr>
                                                <tr>
                                                    <th class="center">
                                                        {!!Html::link('files/funcionarioall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
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
                                    <div class="col-md-8 col-md-offset-2 col-xs-12">
                                        <div class="alert alert-info">
                                            <strong>Execelente!</strong><br><br>
                                            <ul>
                                                <li>No hay Funcionario(s) ingresado(s)</li>
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