<html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Login UTEM</title>
    {!!Html::style('css/login.css')!!}
</head>
<body>
@if (count($errors) > 0)
    <div class="container">
        <div id="content">
            <strong>OOoops!</strong> Hubo algunos problemas con su entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <br/>
        </div>
    </div>
@endif
<div class="container">
    <section id="content">
        {!!Form::open(['route' => 'auth.login', 'method'=> 'POST'])!!}
            {!! Html::image('/img/Logo_UTEM.png','UTEM') !!}
            <div>
                <input type="text" placeholder="Rut Dirdoc" required="" id="rut" name="rut" />
            </div>
            <div>
                <input type="password" placeholder="Password" required="" id="password" name="password"/>
            </div>
            <div>
                <input type="submit" value="Log in" />
            </div>
        {!!Form::close()!!}
    </section><!-- content -->
</div><!-- container -->
</body>
</html>