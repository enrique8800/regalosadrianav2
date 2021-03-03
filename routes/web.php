<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    return redirect()->route('login');
});
Route::get('empresas', 'EmpresaController@index')->name('empresas.index');

Route::group(['middleware' => ['role:Guest']], function () {

    Route::get('ventas/reportes_dia', 'ReporteController@reportes_dia')->name('reportes.dia');
    Route::get('ventas/reportes_fecha', 'ReporteController@reportes_fecha')->name('reportes.fecha');

    Route::post('ventas/reporte_res', 'ReporteController@reporte_res')->name('reporte.res');

    Route::resource('empresas', 'EmpresaController')->names('empresas')->only([
        'index']);

    Route::resource('categorias', 'CategoriaController')->names('categorias')->except([
        'edit', 'update', 'destroy']);

    Route::resource('clientes', 'ClienteController')->names('clientes')->except([
        'edit', 'update', 'destroy']);

    Route::resource('productos', 'ProductoController')->names('productos')->except([
        'edit', 'update', 'destroy']);

    Route::resource('providers', 'ProviderController')->names('providers')->except([
        'edit', 'update', 'destroy']);

    Route::resource('compras', 'CompraController')->names('compras')->except([
        'edit', 'update', 'destroy']);

    Route::resource('ventas', 'VentaController')->names('ventas')->except([
        'edit', 'update', 'destroy']);

    Route::get('compras/pdf/{compra}', 'CompraController@pdf')->name('compras.pdf');
    Route::get('ventas/pdf/{venta}', 'VentaController@pdf')->name('ventas.pdf');

    Route::get('get_products_by_barcode', 'ProductoController@get_products_by_barcode')->name('get_products_by_barcode');

    Route::get('get_products_by_id', 'ProductoController@get_products_by_id')->name('get_products_by_id');

});

Route::get('ventas/reportes_dia', 'ReporteController@reportes_dia')->name('reportes.dia');
Route::get('ventas/reportes_fecha', 'ReporteController@reportes_fecha')->name('reportes.fecha');

Route::post('ventas/reporte_res', 'ReporteController@reporte_res')->name('reporte.res');

Route::resource('empresas', 'EmpresaController')->names('empresas')->only([
    'index', 'update']);
Route::resource('impresoras', 'ImpresoraController')->names('impresoras')->only([
    'index', 'update']);

Route::resource('categorias', 'CategoriaController')->names('categorias');

Route::resource('clientes', 'ClienteController')->names('clientes');

Route::resource('productos', 'ProductoController')->names('productos');

Route::resource('providers', 'ProviderController')->names('providers');

Route::resource('compras', 'CompraController')->names('compras')->except([
    'edit', 'update', 'destroy']);

Route::resource('ventas', 'VentaController')->names('ventas')->except([
    'edit', 'update', 'destroy']);




Route::get('compras/pdf/{compra}', 'CompraController@pdf')->name('compras.pdf');
Route::get('ventas/pdf/{venta}', 'VentaController@pdf')->name('ventas.pdf');

Route::get('change_status/productos/{producto}', 'ProductoController@change_status')->name('change.status.productos');
Route::get('change_status/compras/{compra}', 'CompraController@change_status')->name('change.status.compras');
Route::get('change_status/ventas/{venta}', 'VentaController@change_status')->name('change.status.ventas');


Route::get('get_products_by_barcode', 'ProductoController@get_products_by_barcode')->name('get_products_by_barcode');

Route::get('get_products_by_id', 'ProductoController@get_products_by_id')->name('get_products_by_id');

Route::get('imprimir_codigo', 'ProductoController@imprimir_codigo')->name('imprimir_codigo');

Auth::routes(['register' => true]);
Route::get('/home', 'HomeController@index')->name('home');




//INSERT INTO `empresas`(`id`, `nombre`, `direccion`, `email`, `logo`, `descripcion`, `created_at`, `updated_at`) VALUES (1,"Regalos Adriana","C/Alcalde Cipriano Moreno Montero","regalosAdriana@gmail.com","","Empresa familiar con buen ambiente","2021-02-22 23:13:06","2021-02-22 23:13:06")