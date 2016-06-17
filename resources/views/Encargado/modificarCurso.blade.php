@extends('Encargado.homeEncar')

@section('content3')


{!!Form::open(['route' => 'encar.curs.modi.index', 'method' => 'GET'])!!}
                                    <div class="panel panel-success">
                                             <div class="panel-body">
             <h4 align="right">{{$nombreCampus->nombre}}</h4>

                               <div class="panel-heading"><h1>CURSOS</h1></div>
                                    <div class="panel-body">
                                       <p>
                                <a class="btn btn-info" href="{{route('encar.curs.modi.create')}}" 
                                role="button"> Agregar Cursos</a>
                                </p>
                                      <div class="row">
                        
                                <nav class="navbar navbar-left">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <tr><th class="center">Descargar Cursos</th></tr>
                                        <tr>
                                            <th class="center">
                                                {!!Html::link('files/curso-encarall','',['class' => 'glyphicon glyphicon-floppy-save', 'role' => 'button', 'aria-label' => 'Center Align'])!!}
                                            </th>
                                        </tr>
                                    </table>
                                </nav>
                           
                        </div>
                                    </p>
                                    <p>Hay {{ $cursos->total() }} Registros</p>
                              <div class="table-responsive">
                             <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    
                                        <tr>
                             
                                            <th>Asignatura</th>
                                            <th>Docente</th>
                                            <th>semestre</th>
                                            <th>anio</th>
                                            <th>seccion</th>
                                            <th>accion</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($cursos as $cur)
                                          <tr>
                               
                                            <td>{{ $cur->asignatura->nombre}}</td>
                                            <td>{{ $cur->docente->nombres}}</td>
                                            <td>{{ $cur->semestre}}</td>
                                            <td>{{ $cur->anio}}</td>
                                            <td>{{ $cur->seccion}}</td>
                                            
                                            <td>
                                             <a href="{{ route('encar.curs.modi.edit', $cur) }}">Editar</a>
                                             
                                             </td>
                                             
                                        </tr>
                                     
                                      @endforeach
                                    </tbody>
                               </table>
                                 {!!$cursos->render()!!}
                                </div>  
                                                      
                        </div> 

{!!Form::close()!!}
    

@endsection
