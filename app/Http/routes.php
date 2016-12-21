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

Route::get('panel/estudiante/', [
  'uses'  =>  'estudianteController@index',
  'as'    =>  'estudiante.index',
]);

Route::get('panel/estudiante/create', [
  'uses'  =>  'estudianteController@create',
  'as'    =>  'estudiante.create',
]);

Route::post('panel/estudiante/store', [
  'uses'  =>  'estudianteController@store',
  'as'    =>  'estudiante.store',
]);

/*
Route::get('lista/editar/{id}', [
    'uses'  =>  'listaController@edit',
    'as'    =>  'lista.edit',
]);

Route::patch('lista/update/{id}', [
    'uses'  => 'listaController@update',
    'as'    => 'lista.update',
]);

Route::delete('lista/eliminar/{id}', [
    'uses'  =>  'listaController@destroy',
    'as'    =>  'lista.destroy',
]);
*/

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
