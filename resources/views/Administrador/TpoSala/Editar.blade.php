@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            {!! Html::linkRoute('Admin.TpoSala.index','Tipo sala') !!}
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
                        {!! Form::model($TpoSalas,array('route' => array('Admin.TpoSala.update',$TpoSalas->id),'class'=>'form-vertical', 'method' => 'PUT')) !!}
                        <div class="form-group">

                            {!!Form::label('nombre','Nombre Campus',['class' => 'control-label'])!!}
                            {!!Form::text('nombre',$TpoSalas->nombre,['class' => 'form-control'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'control-label'])!!}
                            {!!Form::textarea('descripcion',$TpoSalas->descripcion,['class' => 'form-control'])!!}

                        </div>
                        {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection