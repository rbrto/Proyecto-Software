@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            {!! Html::linkRoute('Admin.Campus.index','Campus') !!}
            <a class="glyphicon glyphicon-menu-right"></a>
            crear
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
                                </ul></div>
                        @elseif(Session::has('alert'))
                            <div class="alert alert-warning">
                                <strong>OOpps!</strong><br><br>
                                <ul>
                                    <li>{{ Session::get('alert') }}</li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        {!!Form::open(['route' => 'Admin.Campus.store','method' => 'POST', 'class'=>'form-vertical'])!!}
                        <div class="form-group">

                            {!!Form::label('nombre','Nombre Campus',['class' => 'control-label'])!!}
                            {!!Form::text('nombre','',['class' => 'form-control'])!!}

                            {!!Form::label('direccion','Direccion',['class' => 'control-label'])!!}
                            {!!Form::text('direccion','',['class' => 'form-control'])!!}

                            {!!Form::label('latitud','Latitud',['class' => 'control-label'])!!}
                            {!!Form::number('latitud','',['class' => 'form-control','step' => '0.001'])!!}

                            {!!Form::label('longitud','Longitud',['class' => 'control-label'])!!}
                            {!!Form::number('longitud','',['class' => 'form-control','step' => '0.001'])!!}

                            {!!Form::label('encargado','Encargado',['class' => 'control-label'])!!}
                            {!!Form::select('encargado',$Encargado,'',['class' => 'form-control'])!!}

                            {!!Form::label('descripcion','Descripcion',['class' => 'control-label'])!!}
                            {!!Form::textarea('descripcion','',['class' => 'form-control'])!!}

                        </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}
                    </div>
                    <div class="col-md-6">
                        {!!Form::open(['route' => 'files.campus.Up','method' => 'POST','enctype' =>'multipart/form-data', 'class'=>'form-vertical'])!!}
                        <div class="form-group">
                            {!!Form::label('file','Adjuntar archivo',['class' => 'control-label'])!!}
                            <input type="file" name="file">

                        </div>
                        {!!Form::button('Enviar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}


                        <ul class="nav nav-pills">
                            <li><a href="#tutorial">Tutorial Subir archivos Campus</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="tutorial" class="modalmask">
        <div class="modalbox movedown">
            <a href="#close" title="Close" class="close">X</a>
            <div id="slider">
                <ul>
                    <h1><p>Consejos para subir un archivo CSV</p></h1>
                    <li>
                        <p>Fijarse bien en los nombes <br/> Los nombres deben de ir en este orden y escritos de la misma forma, como se muestra a continuacion</p>
                        {!! Html::image('/img/tutorial/tutorialCampus.png','tutorialCampus') !!}
                        <p>Si el sistema no los encuentra parecido va a retornar a la vista principal con un mensaje de error</p>
                    </li>
                    <li>
                        <p>Los RUT debe de existir en el sistema de lo contrario pasara a la fila siguiente del CSV </p>
                    </li>
                    <li>
                        <p> Basta que un campus no exista para que el sistema guarde el nombre, los demas que ya existan los pasara por alto </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection