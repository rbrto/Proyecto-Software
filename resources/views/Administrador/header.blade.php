<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/modal.css')!!}
    {{--    ICONO EN EL NAVEGADOR --}}
    <link rel="shortcut icon" href="/img/utem_icono.png"/>
    @if($_SERVER["REQUEST_URI"] == "/Admin/Slider")
        <link href="http://fonts.googleapis.com/css?family=Armata" rel="stylesheet" type="text/css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
        {!!Html::style('css/jquery.gridder.min.css')!!}
        {!!Html::style('css/demo.css')!!}
    @endif
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <!-- El logotipo y el icono que despliega el menú se agrupan
         para mostrarlos mejor en los dispositivos móviles -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        {!! Html::image('/img/Logotipo_UTEM.png','logoTipo',['class'=>'navbar-brand']) !!}
    </div>

    <!-- Agrupar los enlaces de navegación, los formularios y cualquier
         otro elemento que se pueda ocultar al minimizar la barra -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li><a href="http://reko.utem.cl/portal/">REKO</a></li>
            <li><a href="http://postulacion.utem.cl/">DIRDOC</a></li>
            <li>{!!Html::linkRoute('Admin.home.index','Home')!!}</li>
        </ul>
        <!--<form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-default">Enviar</button>
        </form>-->

        <ul class="nav navbar-nav navbar-right">
            <li>{!! Html::linkRoute('Admin.Slider.index','?') !!}</li>
            @if (Auth::guest())
                <li><a href="{{ url('/auth/login') }}">Entrar</a></li>
                <li><a href="{{ url('/auth/register') }}">Registrarse</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{Auth::user()->nombres}} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/auth/logout') }}">Salir</a></li>
                        <li>{!! Html::linkRoute('contacto.index','Contacto') !!}</li>
                    </ul>
                </li>
            @endif

        </ul>
    </div>
</nav>


@yield('content')

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!--<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	-->

	{!!Html::script('js/bootstrap.min.js')!!}
	{!!Html::script('js/jquery-2.1.4.min.js')!!}
	{!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/alert.js')!!}
	<!--<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>-->

    {!! HTML::script('js/jquery.Rut.min.js') !!}
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            $(".mensaje").fadeOut(1500);
        },4000);
    });
</script>

@if($_SERVER["REQUEST_URI"] == "/Admin/Slider")

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    {!!Html::script('js/jquery.gridder.js')!!}
    <script>
        jQuery(document).ready(function ($) {

            // Call Gridder
            $(".gridder").gridderExpander({
                scrollOffset: 60,
                scrollTo: "panel", // "panel" or "listitem"
                animationSpeed: 400,
                animationEasing: "easeInOutExpo",
                onStart: function () {
                    console.log("Gridder Inititialized");
                },
                onExpanded: function (object) {
                    console.log("Gridder Expanded");
                    $(".carousel").carousel();
                },
                onChanged: function (object) {
                    console.log("Gridder Changed");
                },
                onClosed: function () {
                    console.log("Gridder Closed");
                }
            });
        });
    </script>
@endif
</body>
</html>
