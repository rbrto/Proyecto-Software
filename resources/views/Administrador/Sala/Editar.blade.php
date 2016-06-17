@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            {!! Html::linkRoute('Admin.Salas.index','Salas') !!}
            <a class="glyphicon glyphicon-menu-right"></a>
            Editar
        </div>
        <div class="panel-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>OOoops!</strong> Hubo algunos problemas con su entrada.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-xs-9">
                        {!! Form::model($Salas,array('route' => array('Admin.Salas.update',$Salas->id),'class'=>'form-vertical','method' => 'PUT')) !!}
                        <div class="form-group">

                            {!!Form::label('campus_id','Ingrese Campus',['class' => 'control-label'])!!}
                            {!!Form::select('campus_id',$Campus,$Salas->campus_id,['class' => 'form-control'])!!}

                            {!!Form::label('tipo_sala_id','Ingrese Tipo de sala',['class' => 'control-label'])!!}
                            {!!Form::select('tipo_sala_id',$Tposala,$Salas->tipo_sala_id,['class' => 'form-control'])!!}

                            {!!Form::label('nombre','Nombre Sala',['class' => 'control-label'])!!}
                            {!!Form::text('nombre',$Salas->nombre,['class' => 'form-control'])!!}

                            {!!Form::label('capacidad','Capacidad',['class' => 'control-label'])!!}
                            {!!Form::number('capacidad',$Salas->capacidad,['class' => 'form-control'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'control-label'])!!}
                            {!!Form::textarea('descripcion',$Salas->descripcion,['class' => 'form-control'])!!}

                        </div>
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection