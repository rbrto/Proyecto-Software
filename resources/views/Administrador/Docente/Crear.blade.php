@extends('Administrador.homeAdm')

@section('body')
    <div class="panel panel-success">
        <div class="panel-body">
            {!! Html::linkRoute('Admin.Docente.index','Docente') !!}
            <a class="glyphicon glyphicon-menu-right"></a>
            Crear
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
                        {!!Form::open(['route' => 'Admin.Docente.store','method' => 'POST', 'class'=>'form-vertical'])!!}
                        <div class="form-group">

                            {!!Form::label('nombres','Nombres',['class' => 'control-label'])!!}
                            {!!Form::text('nombres','',['class' => 'form-control'])!!}

                            {!!Form::label('apellidos','Apellidos',['class' => 'control-label'])!!}
                            {!!Form::text('apellidos','',['class' => 'form-control'])!!}

                            {!!Form::label('rut','RUT',['class' => 'control-label'])!!}
                            {!!Form::number('rut','',['class' => 'form-control','min'=> '1000000','max'=> '99999999', 'required'=>'required'])!!}

                            {!!Form::label('email','E-MAIL',['class' => 'control-label'])!!}
                            {!!Form::email('email','',['class' => 'form-control'])!!}

                            {!!Form::label('departamentos','Departamentos',['class' => 'control-label'])!!}
                            {!!Form::select('departamentos',$depto,'',['class' => 'form-control'])!!}

                        </div>
                        {!!Form::button('Crear',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}


                    </div>

                    <div class="col-md-6">
                        {!!Form::open(['route' => 'files.Docente.up','method' => 'POST','enctype' =>'multipart/form-data','class'=>'form-vertical'])!!}
                        <div class="form-group">
                            {!!Form::label('file','Adjuntar archivo',['class' => 'control-label'])!!}
                            <br/>
                            <input type="file" name="file">

                        </div>
                        {!!Form::button('Enviar',['class' => 'btn btn-danger col-md-4 col-md-offset-8','type' => 'submit'])!!}
                        {!!Form::close()!!}

                        <ul class="nav nav-pills">
                            <li><a href="#tutorial">Tutorial Subir archivos Docente</a></li>
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
                        <p>Fijarse bien en los nombes <br/> Los nombres deben de ir en este orden y escritos de la misma forma, como se muestra a continuacion </p>
                        {!! Html::image('/img/tutorial/tutorialEstudiante.png','tutorialEstudiante') !!}
                        <p>Si el sistema no los encuentra parecido va a retornar a la vista principal con un mensaje de error</p>
                    </li>
                    <li>
                        <p> el RUT es un atributo unico de cada persona, por ende no se puede replicar </p>
                    </li>
                    <li>
                        <p> Basta que un Docente no exista para que el sistema lo guarde, los demas que ya existan los pasara por alto </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection