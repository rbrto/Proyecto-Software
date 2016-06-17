<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controller('contacto','ContactoController',[
    'getIndex' => 'contacto.index',
]);
Route::controller('files','Excel\FilesController',[
    'getCampus'                 => 'files.Campus',
    'getCampusall'              => 'files.Campusall',
    'postUpcampusfiles'         => 'files.campus.Up',
    'getFacultad'               => 'files.Facultad',
    'getFacultadall'            => 'files.Facultadall',
    'postUpfacultadfiles'       => 'files.facultad.up',
    'getDepartamento'           => 'files.Departamento',
    'getDepartamentoall'        => 'files.Departamentoall',
    'postUpdepartamentosfiles'  => 'files.departamento.up',
    'getEscuela'                => 'files.Escuela',
    'getEscuelall'              => 'files.Escuelall',
    'postUpescuelafiles'        => 'files.Escuela.up',
    'getTposala'                => 'files.Tposala',
    'getTposalall'              => 'files.Tposalall',
    'postTposalafiles'          => 'files.Tposala.up',
    'getSala'                   => 'files.Sala',
    'getSalall'                 => 'files.Salall',
    'postSalafiles'             => 'files.Salas.up',
    'getAdministrador'          => 'files.Administrador',
    'getAdministradorall'       => 'files.Administradorall',
    'getCarrera'                => 'files.Carrera',
    'getCarrerall'              => 'files.Carrerall',
    'postCarrerafiles'          => 'files.Carrera.up',
    'getEncargadoall'           => 'files.Encargadoall',
    'getEstudianteall'          => 'files.Estudianteall',
    'postEstudiantefiles'       => 'files.Estudiante.up',
    'getDocenteall'             => 'files.Docenteall',
    'postDocentefiles'          => 'files.Docente.up',
    'getFuncionario'            => 'files.Funcionario',
    'getFuncionarioall'         => 'files.Funcionarioall',
    'postFuncionariofiles'      => 'files.Funcionario.up',
    'postSalafilesEncar'        => 'files.SalasEncar.up',
    'postAsigfilesEncar'        => 'files.AsigEncar.up',
    'postEstufilesEncar'        => 'files.EstuEncar.up',
    'postDocefileEncar'         => 'files.DoceEncar.up',
    'postCursfileEncar'         => 'files.CursEncar.up',
    'getAsignaturaEncarall'     => 'files.AsignaturaEncarall',
    'getSalaEncarall'           => 'files.SalaEncarall',
    'getEstudianteEncarall'     => 'files.EstudianteEncarall',
    'getDocenteEncarall'        => 'files.DocenteEncarall',
    'getCursoEncarall'          => 'files.CursoEncarall',
    'postAsigCursEncar'          => 'files.AsigCursEncar.up',

]);

Route::controller('auth', 'Auth\AuthController', [
    'getLogin'  => 'auth.login',
    'postLogin' => 'auth.doLogin',
    'getLogout' => 'auth.logout'
]);


Route::get('/home', ['as' => 'home', 'middleware' => ['auth', 'redir'], function(){
    return 'home';
}]);

Route::group(['middleware' =>'admin','prefix' =>  'Admin', 'namespace' => 'Administrador'], function(){
//Route::group(['prefix' =>  'Admin', 'namespace' => 'Administrador'], function(){
    Route::resource('home','AdmUserController');
    Route::resource('Campus','CampusController'); //CRUD PARA CAMPUS
    Route::resource('Facultad','FacultadController'); //CRUD PARA Facultad
    Route::resource('Depto','DepartamentoController'); //CRUD PARA Depto
    Route::resource('Escuela','EscuelaController'); //CRUD PARA Escuela
    Route::resource('TpoSala','TipoSalasController'); //CRUD PARA TIPOS DE SALA
    Route::resource('Salas','SalasController'); //CRUD PARA SALA
    Route::resource('Carrera','CarreraController');

    Route::resource('Administrador','AdministradorController');
    Route::resource('EncargadoCampus','EncargadoCampusController');
    Route::resource('Estudiante','EstudianteController');
    Route::resource('Docente','DocenteController');
    Route::resource('Funcionario','FuncionarioController');

    Route::resource('Slider','sliderController');
});

Route::group(['middleware' =>'docente','prefix' =>  'Docente', 'namespace' => 'Docente'], function(){
//Route::group(['prefix' =>  'Docente', 'namespace' => 'Docente'], function(){
    Route::resource('home','DocUserController');
    Route::controller('Asignatura', 'ConsultaSalasController',[
        'getShowasignatura' => 'Docente.Asignatura.show',
        'getConsulta'=>'Docente.Consulta.show',
        'postConsutla' => 'Docente.peticion',
    ]);
});


//PROBANDO RESOURCE PARA ASIGNATURAS

Route::group(['middleware' => 'Encar','prefix' =>  'encar', 'namespace' => 'Encargado'], function(){
//Route::group(['prefix' =>  'encar', 'namespace' => 'Encargado'], function(){
    Route::resource('asig/modi','asigController'); //CRUD PARA ASIGNATURA
    Route::resource('estu/modi','estuController');  //CRUD PARA ESTUDIANTE
    Route::resource('curs/modi','cursController');  //CRUD PARA CURSO
    Route::resource('salas/modi','SalasController'); //CRUD PARA SALAS
    Route::resource('home','EncarUserController');  
    Route::resource('asignar/modi','AsignarSalasController'); //PARA ASIGNAR SALA
    Route::resource('doce/modi','DocenteController'); //CRUD PARA DOCENTE
    Route::resource('hora/modi','ConsultaHorarioController'); //CRUD PARA HORARIO
    Route::resource('cursadas/modi','AsignaturasCursadasController');//CRUD PARA ASIGNATURAS CURSADAS

    });
Route::group(['middleware'=>'Estu','prefix'=> 'estu','namespace'=> 'Estudiante'], function(){
   Route::resource('home','EstuUserController');
   Route::resource('horario','horarioController');
});

Route::resource('users/encargados', 'Encargado\EncarUserController');

