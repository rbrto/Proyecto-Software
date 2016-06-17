@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            Administradores
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
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
                                        <a class="btn glyphicon glyphicon-plus" href="/Admin/Administrador/create" role="button" aria-label="Left Align">Crear Administrador</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        @if(count($Adminis) > 0)
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th class="center">Nombres</th>
                                        <th class="center">RUT</th>
                                        <th class="center">email</th>
                                        <th class="center">Editar</th>
                                        <th class="center">Eliminar</th>
                                        <th class="center">Descargar</th>
                                    </tr>
                                    @foreach($Adminis as $Admin)
                                        <tr>
                                            <th class="center">{{$Admin->apellidos.','.$Admin->nombres}}</th>
                                            <th class="center">{{$Admin->rut}}</th>
                                            <th class="center">{{$Admin->email}}</th>
                                            <th class="center">{!!Html::link('Admin/Administrador/'.$Admin->rut.'/edit','',['class'=>'btn glyphicon glyphicon-pencil','role'=>'button', 'aria-label'=>'Left Align'])!!}</th>
                                            <th class="center">
                                                {!!Form::open(array('route' => array('Admin.Administrador.destroy',$Admin->rut), 'method' => 'DELETE'))!!}
                                                {!!Form::button(null,['class'=>'btn glyphicon glyphicon-remove', 'type'=>'submit'])!!}
                                                {!!Form::close()!!}
                                            </th>
                                            <th class="center">
                                                {!!Html::link('files/administrador/'.$Admin->rut,'',['class' => 'btn glyphicon glyphicon-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-md-3 col-md-offset-9 col-xs-5 col-xs-offset-7">
                                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                            <tr><th class="center">Descargar Usuario</th></tr>
                                            <tr>
                                                <th class="center">
                                                    {!!Html::link('files/administradorall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                                </th>
                                            </tr>
                                        </table>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-8 col-md-offset-4 col-xs-12">
                                    <div class="alert alert-info">
                                        <strong>Execelente!</strong><br><br>
                                        <ul>
                                            <li>No hay administrador(es) registrados</li>
                                        </ul>
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