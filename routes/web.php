<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

Route::get('/dondeestamos', function () {
    return view('dondeestamos');
})->name('dondeestamos');

// returns the home page with all posts
// Route::get('/', PostController::class .'@index')->name('posts.index');
// returns the form for adding a post
Route::get('/posts/create', PostController::class . '@create')->name('posts.create');
// adds a post to the database
Route::post('/posts', PostController::class .'@store')->name('posts.store');
// returns a page that shows a full post
Route::get('/posts/{post}', PostController::class .'@show')->name('posts.show');
// returns the form for editing a post
Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('posts.edit');
// updates a post
Route::put('/posts/{post}', PostController::class .'@update')->name('posts.update');
// deletes a post
Route::delete('/posts/{post}', PostController::class .'@destroy')->name('posts.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas Dashmix
// Route::view('/', 'landing');
Route::match(['get', 'post'], '/dashboard', function(){
    return view('dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');
