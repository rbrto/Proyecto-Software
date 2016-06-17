@extends('Encargado.homeEncar')

@section('content4')

{!!Form::open(['route' => 'encar.estu.modi.index', 'method' => 'GET'])!!}
                                
                              <div class="panel panel-success">
                              <div class="panel-body">
                                           <h4 align="right">{{$nombreCampus->nombre}}</h4>

  								<div class="panel-heading"><h1>ESTUDIANTES</h1></div>
                                    <div class="panel-body">
                                     <p>
                                <a class="btn btn-info" href="{{route('encar.estu.modi.create')}}" 
                                role="button"> Agregar Estudiantes</a>
                                </p>
                                      <div class="row">
                           
                                <nav class="navbar navbar-left">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <tr><th class="center">Descargar Estudiantes</th></tr>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/estudiante-encarall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                    </table>
                                </nav>
                           
                        </div>
                                    </p>
                                    <p>Hay {{ $estu->total() }} Registros</p>
                                        <table class="table table-bordered">
                                            <tr>
                                              
                                              <th>Rut</th>
                                              <th>Nombres</th>
                                              <th>Apellidos</th>
                                              <th>Email</th>
                                              <th>Carrera</th>
                                              <th>Accion</th>

                                              
                                            </tr>

                                           @foreach($estu as $Estu)
                                            <tr>
                                           
                                                <td>{{$Estu-> rut}}</td>
                                                <td>{{$Estu-> nombres}}</td>
                                                <td>{{$Estu-> apellidos}}</td>
                                                <td>{{$Estu-> email}}</td>
                                                <td>{{$Estu-> carrera->nombre}}</td>
                                                <td><a href="{{ route('encar.estu.modi.edit', $Estu ) }}">Editar</td>      
                                            </tr>
                                           @endforeach
                                        </table>
                                        {!! $estu->render()!!}
                                    </div>
                                    </div>
                                    </div>
                                  
{!!Form::close()!!}

@endsection