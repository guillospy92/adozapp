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

Route::get('/', ['middleware'=>'auth','uses'=>'WelcomeController@index','as'=>'home']);

Route::get('home',['uses'=>'HomeController@index']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('adoz/clientes/{id}',['as'=>'clientes','uses'=>'HomeController@client']);
Route::get('adoz/años/{sub}/{id}',['as'=>'anos','uses'=>'HomeController@anos']);
Route::get('adoz/años/meses/{subarea}/{cliente}/{id}',['as'=>'meses','uses'=>'HomeController@meses']);
Route::get('adoz/subareas/{sub}/{cliente}/{ano}/{mes}', ['as'=>'admin','uses'=>'HomeController@archivos']);
Route::get('adoz/subareas/años/meses/{sub}/{ano}/{id}',['as'=>'clientess','uses'=>'HomeController@clientes']);
Route::post('adoz/subarea/createfile',['as'=>'createfile','uses'=>'HomeController@createarchivos']);
Route::post('adoz/multiple/archivos',['as'=>'multiples','uses'=>'HomeController@multiplearchivo']);
Route::resource('clientes','ClientesController');
Route::Post('clientes/actualizando',['as'=>'actualizarcliente','uses'=>'ClientesController@actualizarcliente']);
Route::post('asociar',['as'=>'asociar','uses'=>'ClientesController@asociar']);
Route::resource('anos','AnoController');
Route::resource('archivos','ArchivoController');
Route::Post('ano/actualizando',['as'=>'actualizarano','uses'=>'AnoController@actualizarano']);
Route::resource('usuarios','UserController');
Route::Post('usuario/actualizando',['as'=>'actualizarusuario','uses'=>'UserController@actualizarusuario']);
Route::get('index/metadata/{id}',['as'=>'metadata','uses'=>'HomeController@metadata']);
Route::get('archivos/esperado/{sub}/{cliente}/{ano}/{mes}/{factu}',['as'=>'esperado','uses'=>'HomeController@esperado']);
Route::post('factura/nueva/',['as'=>'factura','uses'=>'HomeController@nuevafactura']);
Route::resource('esperados','EsperadoController');
Route::Post('esperado/actualizando',['as'=>'actualizaresperado','uses'=>'EsperadoController@actualizaresperado']);
Route::post('pdf/reportes',['as'=>'pdf','uses'=>'HomeController@reporte']);
Route::post('busqueda/avanzada',['as'=>'busquedaavanzada','uses'=>'HomeController@busquedaavanzada']);
Route::get('subareas/{id}',['uses'=>'HomeController@getsubareas','as'=>'getsubareas']);
Route::get('obtenerjson',['uses'=>'HomeController@jsonfac','as'=>'json']);
Route::get('estadisticas',['uses'=>'EstadisticaController@index','as'=>'estad']);
Route::get('obtenerjson/{id}',['uses'=>'HomeController@jsonfacid','as'=>'jsonid']);
Route::resource('enviaremail','MailController');
Route::post('cargar_archivo_correo', 'MailController@store');
Route::post('sendmail',['uses'=>'HomeController@sendd', 'as'=>'sendemail']);














