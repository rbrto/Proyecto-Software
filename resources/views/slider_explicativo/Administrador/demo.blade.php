@extends('Administrador.header')

@section('content') <!-- EN ESTA SECCION VAMOS A MOSTRAR UNA BARRA LATERAL IZQUIERDA -->

<div class="container">
            <h1>Explicación de la pagina </h1>
		</div>

		<div class="container">
			
            <ul class="gridder">
                <li class="gridder-list" data-griddercontent="#gridder-content-1">
                    {!! Html::image('/img/sliders/Administrador/home.png','logoTipo',['class'=>'img-responsive']) !!}
                </li><!--
                --><li class="gridder-list" data-griddercontent="#gridder-content-2">
                    {!! Html::image('/img/sliders/Administrador/logout.png','logout',['class'=>'img-responsive']) !!}
                </li><!--
                --><li class="gridder-list" data-griddercontent="#gridder-content-3">
                    {!! Html::image('/img/sliders/Administrador/universidad.png','logoTipo',['class'=>'img-responsive']) !!}
                </li><!--
                --><li class="gridder-list" data-griddercontent="#gridder-content-4">
                    {!! Html::image('/img/sliders/Administrador/campus.png','logoTipo',['class'=>'img-responsive']) !!}
                </li><!--
                --><li class="gridder-list" data-griddercontent="#gridder-content-5">
                    {!! Html::image('/img/sliders/Administrador/crear_campus.png','logoTipo',['class'=>'img-responsive']) !!}
                </li><!--
                --><li class="gridder-list" data-griddercontent="#gridder-content-6">
                    {!! Html::image('/img/sliders/Administrador/editar_campus.png','logoTipo',['class'=>'img-responsive']) !!}
                </li><!--
                --><li class="gridder-list" data-griddercontent="#gridder-content-7">
                    {!! Html::image('/img/sliders/Administrador/linux.png','logoTipo',['class'=>'img-responsive']) !!}
                </li>
            </ul>


            <div id="gridder-content-1" class="gridder-content">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::image('/img/sliders/Administrador/home.png','logoTipo',['class'=>'img-responsive']) !!}
                    </div>
                    <div class="col-sm-6">
                        <h2>Menu principal</h2>
                        <p>Dentro de este menú usted podra acceder a las seleccion de<a class="glyphicon glyphicon-education" data-toggle="dropdown">Universidad</a>
                        en donde podra crear todas las dependencia de nuestra gloriosa universidad UTEM, tambien existe la opcion de
                        <a class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown">Crear usuarios</a> como bien dice su nombre, usted podra
                        crear usuarios y darle una mision ya sea que sea administrador (como usted), docente, encargado de campus, estudiante o funcionario. Y por ultimo esta la seccion
                        <a class="dropdown-toggle glyphicon glyphicon-share-alt" data-toggle="dropdown">Cambio Perfil</a> como usted podra crear usuarios y asignarle roles, tambien existe la posibilidad
                        de que le asigne dos roles distintos a un usuario y en esta opcion (si esque tiene mas de un rol) podra cambier de vista </p>
                        <br/>
                        <p> Tambien existen links en donde podra acceder a las paginas de nuestra Universidad asi como DIRDOC o REKO. El link de Home nos devuelve a vista
                        principal de la pagina </p>
                    </div>
                </div>
            </div>
            <div id="gridder-content-2" class="gridder-content">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="http://placehold.it/600x600" class="img-responsive" />
                    </div>
                    <div class="col-sm-6">
                        <h2>Logout</h2>
                        Aqui usted podra salir del sistema cuando desee.
                    </div>
                </div>
            </div>
            <div id="gridder-content-3" class="gridder-content">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::image('/img/sliders/Administrador/universidad.png','logoTipo',['class'=>'img-responsive']) !!}
                    </div>
                    <div class="col-sm-6">
                        <h2>Universidad</h2>
                        <p> Dentro de esta seccion usted podra crear, basicamente, nuestra universidad, en donde le asignara campus a los campus facultades, a las facultades departamentos asi hasta crear las carreras </p>
                        <p> No dejando de lada la arquitectura de cada campo, vamos a tener unas opciones bien particulares crear salas y tipos de salas. Aqui podra asignarle las salas que quiera a los campus ya creados </p>
                    </div>
                </div>
            </div>
            <div id="gridder-content-4" class="gridder-content">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::image('/img/sliders/Administrador/campus.png','logoTipo',['class'=>'img-responsive']) !!}
                    </div>
                    <div class="col-sm-6">
                        <h2>Campus</h2>
                        <p> Vamos bien, estamos en la vista de los distintos campus que puedan existir. Aquí podemos observar que a la vez nos muestra la informacion y si queremos tener una detallada informacion pinchamos en el icono <a class="btn glyphicon glyphicon-save"></a>y mas aun si queremos la info de todos los campus, pinchamos en el icono de descargar campus <a class="glyphicon glyphicon-floppy-save"></a></p>
                        <p> Para poder crear otro campus, vamos a <a class="btn glyphicon glyphicon-plus">Crear Campus</a></p>
                        <p> Si queremos Editar un campo ya ingresado pinchamos el icono <a class="btn glyphicon glyphicon-pencil"></a> </p>
                        <p> Si borrar es lo que quieres hacer pinchar este icono deberas <a class="glyphicon glyphicon-remove"></a> </p>
                        <p> Y por ultimo esta la opcion de buscar, que buscara por el nombre del Campus </p>
                    </div>
                </div>
            </div>
            <div id="gridder-content-5" class="gridder-content">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::image('/img/sliders/Administrador/crear_campus.png','logoTipo',['class'=>'img-responsive']) !!}
                    </div>
                    <div class="col-sm-6">
                        <h2>Crear Campus</h2>
                        <p>  Como bien dice el titulo aqui se podra crear un campus, hay que llenar cada uno de los casilleros, cabe destacar que si es sistema necesita de algunos campos oblicatorios se los va hacer saber en un cuadro de dialogo indicandole que es lo que falta   </p>
                        <p>  Así como ingresar campus de forma unica (un solo campus) tambien existe la forma de crearlos de forma masiva, al costado derecho hay un boton "EXAMINAR" en donde usted buscara dento de su ordenador un archivo con extencion csv para poder agregar masivamente, dentro de esta misma vista existe una forma interactiva que nos enseña a como subir archivos   </p>
                    </div>
                </div>
            </div>
            <div id="gridder-content-6" class="gridder-content">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::image('/img/sliders/Administrador/editar_campus.png','logoTipo',['class'=>'img-responsive']) !!}
                    </div>
                    <div class="col-sm-6">
                        <h2>Editar Campus</h2>
                        <p> Dentro de esta seccion el sistema traera devuelta los atributos del campus, asi poder editarlos de manera facil y comoda. Ya teniendolos editado a su antojo pinchamos en boton Editar  </p>
                    </div>
                </div>
            </div> 
            <div id="gridder-content-7" class="gridder-content">
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::image('/img/sliders/Administrador/linux.png','logoTipo',['class'=>'img-responsive']) !!}
                    </div>
                    <div class="col-sm-6">
                        <h2>GRACIAS</h2>
                        <ul>
                            <li>Basicamente todo el sistema consta con la misma estructura del campus, imagenes mostradas anteriormente</li>
                            <li>Tiene un agregar</li>
                            <li>Un editar</li>
                            <li>Un eliminar</li>
                            <li>Un agregar masivamente, asi como individualemte</li>
                            <li>Buscar en las tamblas en donde sale especificamente que hay que ingresar</li>
                            <li>Descargar individual y masivamente</li>
                            <li>Gracias, ojala que tengas un buen provecho y nos apruebes :) </li>
                        </ul>
                    </div>
                </div>
            </div>
		</div>

@endsection