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

Route::get('/', function () {
    return view('welcome');
    //$pdf = PDF::loadView('welcome');
    //return $pdf->stream();
    //return $pdf->download();
});
Auth::routes();
/*
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');

});*/
/*Route::get('/admin', function(){
	return 'Hola administrador';
});*/
Route::get('/delete', function () {
    return 'Hello World';
});

//ruta de prueba para la creacion de ususarioscm
Route::resource('/createusuarioprueba', 'CreacionUsuarioPruebaController');

Route::get('/inicio', 'HomeController@inicio')->name('inicio');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/salidaVehiculo', 'AdminController@salidaVehiculo')->name('salidaVehiculo');
Route::get('/reporteVehiculos', 'RegistroVehiculoSuperAdminController@reporteVehiculo')->name('reporteVehiculos');

Route::resource('/superadmin', 'SuperAdminController');
Route::resource('/registrousuarios', 'RegistroUsuarioController');
Route::resource('/registroTdocUsuarios', 'RegistroTipoDocumentoUsuarioController');
Route::resource('/registroGeneroUsuarios', 'RegistroGeneroUsuarioController');
Route::resource('/registroGeneroUsuarios', 'RegistroGeneroUsuarioController');
Route::resource('/registroRolUsuarios', 'RegistroRolUsuarioController');

Route::resource('/registroCupoParkSuperAdmin', 'RegistroCupoParkSuperAdminController');
Route::resource('/registroPisoParkSuperAdmin', 'RegistroPisoParkSuperAdminController');
Route::resource('/registroTipoParkSuperAdmin', 'RegistroTipoParkSuperAdminController');
Route::resource('/registroParkSuperAdmin', 'RegistroParkSuperAdminController');
Route::resource('/registroTarifaParkSuperAdmin', 'RegistroTarifaParkSuperAdminController');
Route::resource('/registroUbicacionSuperAdmin', 'RegistroUbicacionSuperAdminController');
Route::resource('/registroUsuParkSuperAdmin', 'RegistroUsuParkSuperAdminController');

Route::resource('/reservas', 'ReservasController');

Route::resource('/valor_tarifa', 'RegistroValorTarifaController');
Route::resource('/adicional_vr_tarifa', 'RegistroAdicionalValorTarifaController');

Route::resource('/admin', 'AdminController');
Route::resource('/registroClientes', 'RegistroClienteController');
Route::resource('/registroVehiculosSuperAdmin', 'RegistroVehiculoSuperAdminController');
Route::resource('/registroTipoVehiculosSuperAdmin', 'RegistroTipoVehiculoSuperAdminController');
Route::resource('/registroMarcaVehiculosSuperAdmin', 'RegistroMarcaVehiculoSuperAdminController');
Route::resource('/rolClientes', 'RolClienteController');

Route::resource('/prueba', 'PruebaController');


Route::resource('/registroVehiculos', 'RegistroVehiculoController');
Route::get('/createusu', 'AdminController@create');
Route::post('/update', 'AdminController@update');
Route::match(['get','put'],'/update/{id}', 'AdminController@update');
Route::match('/delete/{id}', 'AdminController@delete');

/*Route::group(['prefix' => 'reservpark'], function () {
    Route::get('/admin', 'Crud5Controller@index');
    Route::match(['get', 'post'], 'create', 'Crud5Controller@create');
    Route::match(['get', 'put'], 'update/{id}', 'Crud5Controller@update');
    Route::delete('delete/{id}', 'Crud5Controller@delete');
});*/