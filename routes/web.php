<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/about', function () { 
    return 'Ingreso de pagina'; 
});*/

/*Route::get('/user/{id}', function ($id) { 
    return 'ID de usuario: ' . $id; 
});*/

/*Route::get('/user/{id}', function ($id) {
    return 'ID de usuario: ' . $id;
})->where('id', '[0-9]{3}');*/

/*Route::get('/contacto', function () { 
    return 'Página de contacto'; 
})->name('contacto');*/

/*Route::prefix('admin')->group(function () { 
    Route::get('/', function () { 
    return 'Panel de administración'; 
    }); 
    Route::get('/users', function () { 
    return 'Lista de usuarios'; 
    }); 
});*/

Auth::routes();
Route::group(['middleware' => ['auth']], function(){
    //Panel de control
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //Parametros
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);
    //cambio
    Route::get('changestatusproduct', [ProductController::class, 'changestatusproduct'])->name('changestatusproduct');
    Route::get('changestatuscustomer', [CustomerController::class, 'changestatuscustomer'])->name('changestatuscustomer');
    Route::get('changestatusorder', [OrderController::class, 'changestatusorder'])->name('changestatusorder');
});


