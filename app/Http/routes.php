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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [
  'uses'  =>  'homeController@index',
  'as'    =>  'home',
]);

//Rutas Admin------------------------------
//Estudiante
Route::get('admin/estudiante/', [
  'uses'  =>  'estudianteController@index',
  'as'    =>  'admin.estudiante.index',
]);

Route::get('admin/estudiante/create', [
  'uses'  =>  'estudianteController@create',
  'as'    =>  'admin.estudiante.create',
]);

Route::post('admin/estudiante/store', [
  'uses'  =>  'estudianteController@store',
  'as'    =>  'admin.estudiante.store',
]);

Route::get('admin/estudiante/show/{id}', [
  'uses'  =>  'estudianteController@show',
  'as'    =>  'admin.estudiante.show',
]);

Route::get('admin/estudiante/editar/{id}', [
    'uses'  =>  'estudianteController@edit',
    'as'    =>  'admin.estudiante.edit',
]);

Route::patch('admin/estudiante/update/{id}', [
    'uses'  => 'estudianteController@update',
    'as'    => 'admin.estudiante.update',
]);

Route::delete('admin/estudiant/eliminar/{id}', [
    'uses'  =>  'estudianteController@destroy',
    'as'    =>  'admin.estudiante.destroy',
]);

//Persona-----------------------------------
Route::get('admin/persona/', [
  'uses'  =>  'personaController@index',
  'as'    =>  'admin.persona.index',
]);

Route::get('admin/persona/create', [
  'uses'  =>  'personaController@create',
  'as'    =>  'admin.persona.create',
]);

Route::post('admin/persona/store', [
  'uses'  =>  'personaController@store',
  'as'    =>  'admin.persona.store',
]);

Route::get('admin/persona/show/{id}', [
  'uses'  =>  'personaController@show',
  'as'    =>  'admin.persona.show',
]);

Route::get('admin/persona/editar/{id}', [
    'uses'  =>  'personaController@edit',
    'as'    =>  'admin.persona.edit',
]);

Route::patch('admin/persona/update/{id}', [
    'uses'  => 'personaController@update',
    'as'    => 'admin.persona.update',
]);

Route::delete('admin/persona/eliminar/{id}', [
    'uses'  =>  'personaController@destroy',
    'as'    =>  'admin.persona.destroy',
]);

//Evaluacion-----------------------------------
Route::get('admin/evaluacion/', [
  'uses'  =>  'evaluacionController@index',
  'as'    =>  'admin.evaluacion.index',
]);

Route::get('admin/evaluacion/create', [
  'uses'  =>  'evaluacionController@create',
  'as'    =>  'admin.evaluacion.create',
]);

Route::post('admin/evaluacion/store', [
  'uses'  =>  'evaluacionController@store',
  'as'    =>  'admin.evaluacion.store',
]);

Route::get('admin/evaluacion/show/{id}', [
  'uses'  =>  'evaluacionController@show',
  'as'    =>  'admin.evaluacion.show',
]);

Route::get('admin/evaluacion/editar/{id}', [
    'uses'  =>  'evaluacionController@edit',
    'as'    =>  'admin.evaluacion.edit',
]);

Route::patch('admin/evaluacion/update/{id}', [
    'uses'  => 'evaluacionController@update',
    'as'    => 'admin.evaluacion.update',
]);

Route::delete('admin/evaluacion/eliminar/{id}', [
    'uses'  =>  'evaluacionController@destroy',
    'as'    =>  'admin.evaluacion.destroy',
]);

//Materia-----------------------------------
Route::get('admin/materia/', [
  'uses'  =>  'materiaController@index',
  'as'    =>  'admin.materia.index',
]);

Route::get('admin/materia/create', [
  'uses'  =>  'materiaController@create',
  'as'    =>  'admin.materia.create',
]);

Route::post('admin/materia/store', [
  'uses'  =>  'materiaController@store',
  'as'    =>  'admin.materia.store',
]);

Route::get('admin/materia/show/{id}', [
  'uses'  =>  'materiaController@show',
  'as'    =>  'admin.materia.show',
]);

Route::get('admin/materia/editar/{id}', [
    'uses'  =>  'materiaController@edit',
    'as'    =>  'admin.materia.edit',
]);

Route::patch('admin/materia/update/{id}', [
    'uses'  => 'materiaController@update',
    'as'    => 'admin.materia.update',
]);

Route::delete('admin/materia/eliminar/{id}', [
    'uses'  =>  'materiaController@destroy',
    'as'    =>  'admin.materia.destroy',
]);
//Caso-----------------------------------
Route::get('admin/caso/', [
  'uses'  =>  'casoController@index',
  'as'    =>  'admin.caso.index',
]);

Route::get('admin/caso/create', [
  'uses'  =>  'casoController@create',
  'as'    =>  'admin.caso.create',
]);

Route::post('admin/caso/store', [
  'uses'  =>  'casoController@store',
  'as'    =>  'admin.caso.store',
]);

Route::get('admin/caso/show/{id}', [
  'uses'  =>  'casoController@show',
  'as'    =>  'admin.caso.show',
]);

Route::get('admin/caso/editar/{id}', [
    'uses'  =>  'casoController@edit',
    'as'    =>  'admin.caso.edit',
]);

Route::patch('admin/caso/update/{id}', [
    'uses'  => 'casoController@update',
    'as'    => 'admin.caso.update',
]);

Route::delete('admin/caso/eliminar/{id}', [
    'uses'  =>  'casoController@destroy',
    'as'    =>  'admin.caso.destroy',
]);
//Login------------------------------------------

Route::get('/login', [
    'uses'  => 'Auth\AuthController@getLogin',
    'as'    => 'auth.login'
]);
Route::post('/login', [
  'uses'  => 'Auth\AuthController@postLogin',
   'as'    => 'auth.login'
]);
Route::get('/logout', [
  'uses'  => 'Auth\AuthController@getLogout',
   'as'    => 'auth.logout'
]);

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});
