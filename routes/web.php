<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProducttypeController;
use App\Http\Controllers\BeerController;
use App\Http\Controllers\BeerformatController;
use App\Http\Controllers\BeerstyleController;
use App\Http\Controllers\LandingEditController;

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
})->name('welcome');

Route::get('/packs', function () {
    return view('packs');
})->name('packs');

Route::get('/iniciarsesion', function () {
    return view('auth/login');
})->name('iniciarsesion');

Route::get('/registrate', function () {
    return view('auth/register');
})->name('registrate');

Route::get('/cervezas', function () {
    return view('cervezas');
})->name('cervezas');

Route::get('/armatupack', function () {
    return view('armatupack');
})->name('armatupack');

Route::get('/product-pack6', function () {
    return view('product-pack6');
})->name('product-pack6');

Route::get('/product-pack12', function () {
    return view('product-pack12');
})->name('product-pack12');

Route::get('/product-pack24', function () {
    return view('product-pack24');
})->name('product-pack12');


Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

Route::get('/dondeestamos', function () {
    return view('dondeestamos');
})->name('dondeestamos');

/*
Route::resource('productType', ProductTypesController::class);
Route::resource('beer', BeerController::class);
Route::resource('/pages/format', BeerFormatController::class);
Route::resource('beerStyle', BeerStyleController::class);
Route::resource('product', ProductController::class);
Route::resource('landingEdit', LandingEditController::class);

*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas Dashmix
Route::group(['middleware' => ['role:Administrador']], function () {
    Route::match(['get', 'post'], '/dashboard', function(){
        return view('dashboard');
    });
    Route::view('/pages/slick', 'pages.slick');
    Route::view('/pages/datatables', 'pages.datatables');
    Route::view('/pages/blank', 'pages.blank');

    Route::resource('beers', BeerController::class);
    Route::resource('beerstyles', BeerstyleController::class);
    Route::resource('producttypes', ProducttypeController::class);
    Route::resource('beerformats', BeerFormatController::class);
    // Route::get('/views/beerStyle/create', 'BeerStyleController@create')->name('beerStyle.create');
    // Route::get('/views/productType/create', 'ProductTypesController@create')->name('Product_Type.create');
});

