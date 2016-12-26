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

//------------------------------------------

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
