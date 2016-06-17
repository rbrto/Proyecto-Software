@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            {!! Html::linkRoute('Admin.Carrera.index','Carrera') !!}
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
                    <div class="col-md-6">
                        {!! Form::model($Carrera,array('route' => array('Admin.Carrera.update',$Carrera->id), 'method' => 'PUT','class'=>'form-horizontal')) !!}
                        <div class="form-group">

                            {!!Form::label('nombre','Nombre',['class' => 'control-label'])!!}
                            {!!Form::text('nombre',$Carrera->nombre,['class' => 'form-control'])!!}

                            {!!Form::label('codigo','Codigo',['class' => 'control-label'])!!}
                            {!!Form::number('codigo',$Carrera->codigo,['class' => 'form-control'])!!}

                            {!!Form::label('escuela','Escuela',['class' => 'control-label'])!!}
                            {!!Form::select('escuela',$Escuela,$Carrera->escuela->id,['class' => 'form-control'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'control-label'])!!}
                            {!!Form::textarea('descripcion',$Carrera->descripcion,['class' => 'form-control'])!!}


                        </div>
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection