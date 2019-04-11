<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/parqueaderos/{id}/pisos', 'RegistroPisoParkSuperAdminController@byPisos');
Route::get('/roles/{id}/roles', 'RegistroUsuarioController@byRoles');
Route::get('/cupos/{id}/cupos', 'RegistroCupoParkSuperAdminController@byCupos');

Route::get('/park/{id}/byidtipopark', 'RegistroParkSuperAdminController@getParkByIdTipoPark');
Route::get('/vr_tarifa/{id}/tipo_park', 'RegistroValorTarifaController@byValorTarifa');
Route::get('/vr_adicional_tarifa/{id}/tipo_park', 'RegistroAdicionalValorTarifaController@byValorAdicionalTarifa');

Route::get('/webservices/tipo_documento', 'RegistroTipoDocumentoUsuarioController@webServicesTdoc');
Route::get('/webservices/generos', 'RegistroGeneroUsuarioController@webServicesGeneros');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

