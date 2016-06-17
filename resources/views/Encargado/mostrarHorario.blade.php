@extends('Encargado.homeEncar')

@section('content')
                   <div class="container">
                <div class="row">
       
                     
  
                @if ($errors->any())
                    <div class="alert alert-warning" role="alert">
                 
                    <ul>
                         @foreach($errors->all() as $error)
                         <li>{{ $error }} </li>
                          @endforeach
                      </ul>
                      @endif
                  </div>
	
{!!Form::open(['route' => 'encar.salas.modi.show', 'method' => 'GET'])!!}
                             
        <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-1">
                       <div class="panel panel-default">
                          <div class="panel-body">
               
                               <div class="panel-heading"><h1>SALAS</h1></div>
                                    <div class="panel-body">
                                      <p>
                                     
                                    </p>
                                    <p>Hay {{ $salas->total() }} Registros</p>
                                        <table class="table table-bordered">
                                            <tr>
                                             
                                              <th>Nombre</th>
                                              <th>Periodo</th>
                                              
                                            </tr>

                                           @foreach($salas as $Sal)
                                            <tr>
                                        
                                                <td>{{$Sal-> nombre}}</td>
                                                <th>{{ $periodos->inicio }}-{{ $periodos->fin }}</th>
                                            </tr>
                                           @endforeach
                                        </table>
                                        {!! $salas->render()!!}
                                    </div>

                         <a class="btn btn-danger" href="{{url('encar/hora/modi')}}" role="button">Volver</a>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                  
{!!Form::close()!!}
@endsection