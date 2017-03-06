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
Route::group(['middleware' => 'auth'], function () {

  Route::get('inicio/', [
    'uses'  =>  'homeController@index',
    'as'    =>  'home',
  ]);
    
    //Reaccion-----------------------------------
    Route::get('admin/reaccion/', [
      'uses'  =>  'reaccionController@index',
      'as'    =>  'admin.reaccion.index',
    ]);

    Route::get('admin/reaccion/create', [
      'uses'  =>  'reaccionController@create',
      'as'    =>  'admin.reaccion.create',
    ]);

    Route::post('admin/reaccion/store', [
      'uses'  =>  'reaccionController@store',
      'as'    =>  'admin.reaccion.store',
    ]);

    Route::get('admin/reaccion/show/{id}', [
      'uses'  =>  'reaccionController@show',
      'as'    =>  'admin.reaccion.show',
    ]);

    Route::get('admin/reaccion/editar/{id}', [
        'uses'  =>  'reaccionController@edit',
        'as'    =>  'admin.reaccion.edit',
    ]);

    Route::patch('admin/reaccion/update/{id}', [
        'uses'  => 'reaccionController@update',
        'as'    => 'admin.reaccion.update',
    ]);

    Route::delete('admin/reaccion/eliminar/{id}', [
        'uses'  =>  'reaccionController@destroy',
        'as'    =>  'admin.reaccion.destroy',
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

    //Contexto
    Route::post('admin/contexto/store', [
      'uses'  =>  'contextoController@store',
      'as'    =>  'admin.contexto.store',
    ]);

    Route::delete('admin/contexto/eliminar/{id}', [
        'uses'  =>  'contextoController@destroy',
        'as'    =>  'admin.contexto.destroy',
    ]);

    Route::post('admin/contexto/update/', [
        'uses'  => 'contextoController@update',
        'as'    => 'admin.contexto.update',
    ]);

    //Reglas
    Route::post('admin/regla/store', [
      'uses'  =>  'reglaController@store',
      'as'    =>  'admin.regla.store',
    ]);

    Route::get('admin/regla/editar/{id}', [
        'uses'  =>  'reglaController@edit',
        'as'    =>  'admin.regla.edit',
    ]);

    Route::patch('admin/regla/update/{id}', [
        'uses'  => 'reglaController@update',
        'as'    => 'admin.regla.update',
    ]);

    Route::delete('admin/regla/eliminar/{id}', [
        'uses'  =>  'reglaController@destroy',
        'as'    =>  'admin.regla.destroy',
    ]);

    Route::group(['prefix' => 'admin'], function () {

        Route::resource('estudiantes', 'estudianteController');
        
        Route::resource('personas', 'personaController');
        

        Route::resource('materias', 'materiaController');
        
        Route::resource('evaluacions', 'evaluacionController');
    
        Route::resource('entradas', 'entradaController');
        
        Route::resource('respuestas', 'respuestaController');

    });    
});
//Login------------------------------------------

Route::get('/', [
    'uses'  => 'Auth\AuthController@getLogin',
    'as'    => 'auth.login'
]);
Route::post('/', [
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
