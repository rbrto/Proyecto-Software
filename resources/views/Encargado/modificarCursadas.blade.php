@extends('Encargado.homeEncar')

@section('content10')
 

{!!Form::open(['route' => 'encar.cursadas.modi.index', 'method' => 'GET'])!!}

 <div class="panel panel-success">
                                         <div class="panel-body">
             <h4 align="right">{{$nombreCampus->nombre}}</h4>

                               <div class="panel-heading"><h1>ASIGNAR ALUMNOS A UN CURSO</h1></div>
                                    <div class="panel-body">
                                      <p>
                                    <div class="panel-body">                                    
                                    <p>Hay {{ $cursos->total() }} Registros</p>
                             <div class="table-responsive">
                             <table id="sample-table-1" class="table table-striped table-bordered table-hover">                                    <thead>
                                        <tr>
                                          
                                            <th>Asignatura</th>
                                            <th>Docente</th>
                                            <th>semestre</th>
                                            <th>anio</th>
                                            <th>seccion</th>
                                            <th># estudiantes </th>
                                            <th>accion</th>
                                            


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i=0;$i<count($cursos);$i++)
                                          <tr>
                                            
                                          
                                            <td>{{ $cursos[$i]->asignatura->nombre}}</td>
                                            <td>{{ $cursos[$i]->docente->nombres}}</td>
                                            <td>{{ $cursos[$i]->semestre}}</td>
                                            <td>{{ $cursos[$i]->anio}}</td>
                                            <td>{{ $cursos[$i]->seccion}}</td>
                                            <td>{{ $cantidad_alumno[$i]}}</td>
                                            <td>                                     
                                            <a href="{{ route('encar.cursadas.modi.show',$cursos[$i]) }}">Asignar Estudiante</a>	
                                            </td>
                                  
                                             
                                        </tr>
                                     
                                      @endfor
                                    </tbody>
                               </table>
                               {!! $cursos->render()!!}

                                </div>  
                                                      
                        </div> 

            </div>      


    </div>


{!!Form::close()!!}

 @endsection