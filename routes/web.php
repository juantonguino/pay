<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function(){
    return view('auth.login');
});

Route::group(['prefix'=>'pay', 'middleware'=>['auth']], function(){
    Route::get('/', function(){
        return view('pay.index');
    });

    Route::resource('tiposervicio','TipoServicioController');

    Route::resource('cliente', 'ClienteController');

    Route::resource('cuentacobro', 'CuentaCobroController');

    Route::get('cuentacobro/report/{id}',[
        'uses'=>'CuentaCobroController@report',
        'as'=>'cuentacobro.report'
    ]);

    Route::get('concepto/{id}',[
        'uses'=>'ConceptoController@index',
        'as'=>'concepto.index'
    ]);
    Route::get('concepto/{id}/create', [
        'uses'=> 'ConceptoController@create',
        'as'=> 'concepto.create']);
    Route::post('concepto/{id}/store',[
        'uses'=>'ConceptoController@store',
        'as'=>'concepto.store'
    ]);
    Route::get('concepto/{idconcepto}/edit',[
        'uses'=>'ConceptoController@edit',
        'as'=>'concepto.edit'
    ]);
    Route::put('concepto/{idconcepto}/update',[
        'uses'=>'ConceptoController@update',
        'as'=>'concepto.update'
    ]);
    Route::get('concepto/{idconcepto}/show',[
        'uses'=>'ConceptoController@show',
        'as'=>'concepto.show'
    ]);
    Route::get('concepto/{idconcepto}/delete',[
        'uses'=>'ConceptoController@destroy',
        'as'=>'concepto.destroy'
    ]);

    Route::get('pasajero/{id}',[
        'uses'=>'PasajeroController@index',
        'as'=>'pasajero.index'
    ]);
    Route::get('Pasajero/{id}/create', [
        'uses'=> 'PasajeroController@create',
        'as'=> 'pasajero.create']);
    Route::post('pasajero/{id}/store',[
        'uses'=>'PasajeroController@store',
        'as'=>'pasajero.store'
    ]);
    Route::get('pasajero/{idconcepto}/edit',[
        'uses'=>'PasajeroController@edit',
        'as'=>'pasajero.edit'
    ]);
    Route::put('pasajero/{idconcepto}/update',[
        'uses'=>'PasajeroController@update',
        'as'=>'pasajero.update'
    ]);
    Route::get('pasajero/{idconcepto}/show',[
        'uses'=>'PasajeroController@show',
        'as'=>'pasajero.show'
    ]);
    Route::get('pasajero/{idconcepto}/delete',[
        'uses'=>'PasajeroController@destroy',
        'as'=>'pasajero.destroy'
    ]);

    Route::get('logout',function()
    {
        Auth::logout();
        return redirect('/');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
