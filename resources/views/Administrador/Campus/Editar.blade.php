@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            {!! Html::linkRoute('Admin.Campus.index','Campus') !!}
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
            <div class="row">
                <div class="col-md-6">
                    {!! Form::model($Campus,array('route' => array('Admin.Campus.update',$Campus->id), 'method' => 'put','class'=>'form-horizontal')) !!}
                    <div class="form-group">

                        {!!Form::label('nombre','Nombre Campus',['class' => 'control-label'])!!}
                        {!!Form::text('nombre',$Campus->nombre,['class' => 'form-control'])!!}

                        {!!Form::label('direccion','Direccion',['class' => 'control-label'])!!}
                        {!!Form::text('direccion',$Campus->direccion,['class' => 'form-control'])!!}

                        {!!Form::label('latitud','Latitud',['class' => 'control-label'])!!}
                        {!!Form::number('latitud',$Campus->latitud,['class' => 'form-control','step' => '0.001'])!!}

                        {!!Form::label('longitud','Longitud',['class' => 'control-label'])!!}
                        {!!Form::number('longitud',$Campus->longitud,['class' => 'form-control','step' => '0.001'])!!}

                        {!!Form::label('encargado','Encargado',['class' => 'control-label'])!!}
                        {!!Form::select('encargado',$Encargado,'',['class' => 'form-control'])!!}

                        {!!Form::label('descripcion','Descripcion',['class' => 'control-label'])!!}
                        {!!Form::textarea('descripcion',$Campus->descripcion,['class' => 'form-control'])!!}

                    </div>
                    {!!Form::button('Editar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection