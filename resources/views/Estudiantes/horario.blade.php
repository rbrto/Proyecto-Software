@extends('Estudiantes.homeAlum')
@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2"> 
		<div class="panel panel-default">
			<div class="panel-body">
				
				@if($_SERVER['REQUEST_URI'] == "/estu/horario")

			       
					Bienvenido, en esta pagina usted podra reconocer su horario 
					  <div class="table-responsive">
                             <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    
                                        <tr>
                             
                                            <th>Asignatura</th>
                                         

                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($Asignatura_Cursada as $as)
                                          <tr>
                               
                                            <td>{{ $as->nombre}}</td>
                                          
           
                                        </tr>
                                     
                                      @endforeach
                                    </tbody>
                               </table>
  
</div>
				@endif
				
			</div>
		</div>
	</div>
</div>

@endsection