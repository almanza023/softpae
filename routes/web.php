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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('jornadas', 'JornadaController');
Route::resource('categorias', 'CategoriaController');
Route::resource('unidades', 'UnidadController');
Route::resource('grupo_etarios', 'GrupoEtarioController');
Route::resource('productos', 'ProductoController');
Route::resource('instituciones', 'InstitucionController');
Route::resource('beneficiarios', 'BeneficiarioController');
Route::resource('menus', 'MenuController');
Route::resource('minutas', 'MinutaController');
Route::resource('calculos', 'CalculoController');

//select dinamicos
Route::get('menus/select/{jornada}', 'MenuController@getMenus');
Route::get('sedes/select/{id}', 'InstitucionController@getSedes');


//filtros
Route::get('filtro/menus', 'MinutaController@filtro')->name('menu.filtro');
Route::get('buscar/menu', 'MenuController@buscar')->name('buscar.menu');
Route::get('buscar/calculos', 'CalculoController@buscar')->name('buscar.calculos');

//estados
Route::get('jornadas/estado/{id}', 'JornadaController@change')->name('jornadas.status');
Route::get('categorias/estado/{id}', 'CategoriaController@change')->name('categorias.status');
Route::get('unidades/estado/{id}', 'UnidadController@change')->name('unidades.status');
Route::get('grupo_etarios/estado/{id}', 'GrupoEtarioController@change')->name('grupo_etarios.status');
Route::get('productos/estado/{id}', 'ProductoController@change')->name('productos.status');
Route::get('instituciones/estado/{id}', 'InstitucionController@change')->name('institucion.status');
Route::get('beneficiarios/estado/{id}', 'BeneficiarioController@change')->name('beneficiario.status');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
