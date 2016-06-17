@extends('Docente.homeDoc')

@section('body')

    <div class="panel panel-success">
        <div class="panel-body">
            Horario
        </div>
        <div class="panel-footer">
            <div class="table-responsive">
                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                    <tr>
                        <th class="center"></th>
                        <th class="center">Lunes</th>
                        <th class="center">Martes</th>
                        <th class="center">Miercoles</th>
                        <th class="center">Jueves</th>
                        <th class="center">Viernes</th>
                    </tr>
                        {{-- ACA VAMOS HACER UN FORECHAR PARA PODER TENER EL HORARIO DEL PROFE,
                            SE VA MOSTRAR DE LA SIGUIENTE FORMA
                            PERIODO_I-HORAIO_LUNES-HORARIO_MARTES...
                            PERIODO_II-HORAIO_LUNES-HORARIO_MARTES...
                            Y ASI SUSECIVAMENTE--}}
                        @foreach($bloques as $bloque)
                        <tr>
                            <th class="center">{{$bloque->inicio.' - '.$bloque->fin}}</th>

                            @for($i=0;$i<5;$i++) {{--DIAS--}}
                                <th>
                                    @for($j=0;$j<count($cursos);$j++)
                                        @if($i == 0 && date('D',strtotime($cursos[$j]->Dia)) == 'Mon')
                                            @if($cursos[$j]->bloque == 'Primer Período')
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == 'Segundo Período')
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Tercer Perídodo")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Cuarto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Quinto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Sexto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Septimo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Octavo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Noveno Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Décimo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @endif
                                        @elseif($i == 1 && date('D',strtotime($cursos[$j]->Dia)) == 'Tue')
                                            @if($cursos[$j]->bloque == 'Primer Período')
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == 'Segundo Período')
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Tercer Perídodo")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Cuarto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Quinto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Sexto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Septimo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Octavo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Noveno Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Décimo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @endif
                                        @elseif($i == 2 && date('D',strtotime($cursos[$j]->Dia)) == 'Wed')
                                            {{dd('wed')}}
                                            @if($cursos[$j]->bloque == 'Primer Período')
                                            @elseif($cursos[$j]->bloque == 'Segundo Período')
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Tercer Perídodo")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Cuarto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Quinto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Sexto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Septimo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Octavo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Noveno Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Décimo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @endif
                                        @elseif($i == 3 && date('D',strtotime($cursos[$j]->Dia)) == 'Thu')
                                            @if($cursos[$j]->bloque == 'Primer Período')
                                            @elseif($cursos[$j]->bloque == 'Segundo Período')
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Tercer Perídodo")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Cuarto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Quinto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Sexto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Septimo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Octavo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Noveno Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Décimo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @endif
                                        @elseif($i == 4 && date('D',strtotime($cursos[$j]->Dia)) == 'Fri')
                                            {{dd('fri')}}
                                            @if($cursos[$j]->bloque == 'Primer Período')
                                            @elseif($cursos[$j]->bloque == 'Segundo Período')
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Tercer Perídodo")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Cuarto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Quinto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Sexto Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Septimo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Octavo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Noveno Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @elseif($cursos[$j]->bloque == "Décimo Período")
                                                {{$cursos[$j]->sala_nombre.'/'.$cursos[$j]->nombre_asignatura.''.$cursos[$j]->seccion}}
                                            @endif
                                        @endif
                                    @endfor
                                </th>
                            @endfor
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection