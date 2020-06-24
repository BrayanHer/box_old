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

// $pdf = App::make('dompdf.wrapper');
// $pdf->loadHTML('<h1>Test</h1>');
// return $pdf->download();
Route::get('/', function () {
    return view('login');
});

Route::get('/principal','VistasController@principal')->name('principal');
Route::get('/principa1','VistasController@principa1')->name('principa1');
Route::get('/Index','VistasController@Index')->name('Index');
// L O G I N 
Route::get('login','loginController@login')->name('login');
Route::post('iniciasesion','loginController@iniciasesion')->name('iniciasesion');
Route::get('cerrarsesion','loginController@cerrarsesion')->name('cerrarsesion');
// V A L E S 

Route::POST('Gvales','ValesController@Gvales')->name('Gvales');

Route::get('comprobacion','ValesController@comprobacion')->name('comprobacion');

Route::get('Historial','ValesController@Historial')->name('Historial');

Route::POST('GDetalles','ValesController@GDetalles')->name('GDetalles');
// F I N A L I Z A C I O N
Route::get('ValeFinalizado','ValesController@ValeFinalizado')->name('ValeFinalizado');

Route::get('/details','ValesController@details')->name('details');

Route::get('/detalle_fin/{ID_VAL}','ValesController@detalle_fin')->name('detalle_fin');

//Modificación
    // consulta 
    Route::get('/detalles/{ID_VAL}','ValesController@detalles')->name('detalles');
    // insercion
    Route::post('/ModChofer','ChoferController@ModChofer')->name('ModChofer');
    // PDF 
    Route::get('/PDFVales/{ID_VAL}','ValesController@PDFVales')->name('PDFVales');

// U S U A R I O S
Route::get('/UpVales/{ID_VAL}','ValesController@UpVales')->name('UpVales');
Route::get('Usuarios','UserController@Usuarios')->name('Usuarios');
Route::POST('Guser','UserController@Guser')->name('Guser');


// Route::get('/', 'DataController@index');
// Route::get('downloadData/{type}', 'DataController@downloadData');
// Route::post('importData', 'DataController@importData');
