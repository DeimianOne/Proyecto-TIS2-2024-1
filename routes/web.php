<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProducttypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BeerController;
use App\Http\Controllers\BeerformatController;
use App\Http\Controllers\BeerstyleController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CompanyEventController;
use App\Http\Controllers\CompanyDistributorController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
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

Route::get('/', [App\Http\Controllers\BeerController::class, 'show5'])->name('welcome');

Route::get('/packs', function () {
    return view('packs');
})->name('packs');

Route::get('/iniciarsesion', function () {
    return view('auth/login');
})->name('iniciarsesion');

Route::get('/registrate', function () {
    return view('auth/register');
})->name('registrate');

Route::get('/armatupack', function () {
    return view('armatupack');
})->name('armatupack');

Route::get('/product-pack6', [BeerController::class, 'show2'])->name('/product-pack6');
Route::get('/product-pack12', [BeerController::class, 'show3'])->name('/product-pack12');
Route::get('/product-pack24', [BeerController::class, 'show4'])->name('/product-pack24');
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');

Route::get('/dondeestamos', function () {
    return view('dondeestamos');
})->name('dondeestamos');



Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/profileusers', [UserController::class, 'editProfile'])->name('profileusers');
    Route::post('/profileusers', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profileusers/change-password', [UserController::class, 'changePassword'])->name('profile.change_password');
    
    Route::post('/favorite/{beer}', [FavoriteController::class, 'toggleFavorite'])->name('favorite.toggle');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/cervezas')->group(function () {
    Route::get('/', [BeerController::class, 'show'])->name('shop');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.store');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/cerveza', [BeerController::class, 'show'])->name('cervezas');
    Route::get('/{id}', [BeerController::class, 'showAndIncrement'])->name('cervezas.showAndIncrement');
});

// Rutas Dashmix
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'role:Administrador']], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('/pages/slick', 'pages.slick');
    Route::view('/pages/datatables', 'pages.datatables');
    Route::view('/pages/blank', 'pages.blank');

    //Roles y permisos
    Route::resource('roles', RolController::class);
    Route::resource('users', UserController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('products', ProductController::class);
    Route::resource('beers', BeerController::class);
    Route::resource('beerstyles', BeerstyleController::class);
    Route::resource('producttypes', ProducttypeController::class);
    Route::resource('beerformats', BeerFormatController::class);
    Route::resource('regions', RegionController::class);
    Route::resource('provinces', ProvinceController::class);
    Route::resource('communes', CommuneController::class);
    Route::resource('distributors', DistributorController::class);
    Route::resource('events', EventController::class);
    Route::resource('companyevents', CompanyEventController::class);
    Route::resource('companydistributors', CompanyDistributorController::class);
    Route::resource('branches', BranchController::class);



});
