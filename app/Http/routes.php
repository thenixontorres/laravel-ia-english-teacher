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

//Rutas Admin
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

Route::post('admin/estudiante/show/{id}', [
  'uses'  =>  'estudianteController@show',
  'as'    =>  'admin.estudiante.show',
]);

Route::get('admin/estudiante/editar/{id}', [
    'uses'  =>  'estudianteController@edit',
    'as'    =>  'admin.estudiante.edit',
]);
/*
Route::patch('lista/update/{id}', [
    'uses'  => 'listaController@update',
    'as'    => 'lista.update',
]);

*/
Route::delete('admin/estudiant/eliminar/{id}', [
    'uses'  =>  'estudianteController@destroy',
    'as'    =>  'admin.estudiante.destroy',
]);

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
