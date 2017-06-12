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

Route::group(['middleware' => 'auth'], function () {

    Route::get('inicio/', [
        'uses'  =>  'homeController@index',
        'as'    =>  'home',
    ]);
    //Rutas Admin--------------------------------------------------
    Route::group(['prefix' => 'admin'], function () {
        Route::group(['middleware' => 'admin'], function () {
        
            Route::resource('estudiantes', 'estudianteController');
            
            Route::resource('personas', 'personaController');
            
            Route::resource('materias', 'materiaController');
            
            Route::resource('evaluacions', 'evaluacionController');

            Route::resource('casos', 'casoController');
            
            Route::resource('contextos', 'contextoController');

            Route::resource('reglas', 'reglaController');
       
            Route::resource('reaccions', 'reaccionController');
        
            Route::resource('entradas', 'entradaController');
            
            Route::resource('respuestas', 'respuestaController');
        });  
    });  
    //Rutas Profesor--------------------------------------------------       
    Route::group(['prefix' => 'profesor'], function () {
        Route::group(['middleware' => 'profesor'], function () {

            Route::resource('estudiantes', 'estudianteController');
            
            Route::get('estudiantes/show/{id}', [
                'uses'  =>  'estudianteController@mis_estudiantes_show',
                'as'    =>  'profesor.estudiantes.mis_estudiantes_show',
            ]);
            Route::resource('personas', 'personaController');

            Route::resource('materias', 'materiaController');
            
            Route::resource('evaluacions', 'evaluacionController');

            Route::resource('notas', 'notaController');

            Route::resource('casos', 'casoController');

            Route::get('casos/micaso/{id}', [
            'uses'  =>  'casoController@micaso',
            'as'    =>  'profesor.casos.micaso',
            ]);

            Route::get('casos/test/{id}', [
            'uses'  =>  'casoController@test',
            'as'    =>  'profesor.casos.test',
            ]);
            
            Route::resource('contextos', 'contextoController');

            Route::resource('reglas', 'reglaController');
       
            Route::resource('reaccions', 'reaccionController');
        
            Route::resource('entradas', 'entradaController');
            
            Route::resource('respuestas', 'respuestaController');
            
            Route::resource('logs', 'logController');

        });    
    });  
});
//Login-----------------------------------------------------------

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
