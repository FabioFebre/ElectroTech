<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\CarritoController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/compras/pdf/{id}', [CompraController::class, 'pdf'])->name('admin.compras.pdf');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Generar PFD

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','admin'])->group(function () {
    Route::get('admin/dashboard',[HomeController::class,'index'])->name('admin.dash');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','admin'])->group(function () {

    Route::get('admin/dashboard',[HomeController::class,'index'])->name('admin.dash');
    Route::get('/admin/productos',[ProductoController::class,'index'])->name('admin/productos');
    Route::get('/admin/productos/index',[ProductoController::class,'index'])->name('admin/productos/index');
    Route::get('/admin/productos/create',[ProductoController::class,'create'])->name('admin/productos/create');
    Route::post('/admin/productos/save',[ProductoController::class, 'save'])->name('admin/productos/save');
    Route::get('/admin/productos/edit/{id}',[ProductoController::class, 'edit'])->name('admin/productos/edit');
    Route::get('/admin/productos/show/{id}', [ProductoController::class, 'show'])->name('admin/productos/show');
    Route::put('/admin/productos/edit/{id}',[ProductoController::class, 'update'])->name('admin/productos/update');
    Route::get('/admin/productos/delete/{id}',[ProductoController::class, 'delete'])->name('admin/productos/delete');

});

Route::middleware(['auth','admin'])->group(function () {

    Route::get('admin/dashboard',[HomeController::class,'index'])->name('admin.dash');
    Route::get('/admin/categorias',[CategoriaController::class,'index'])->name('admin/categorias');
    Route::get('/admin/categorias/index',[CategoriaController::class,'index'])->name('admin/categorias/index');
    Route::get('/admin/categorias/create',[CategoriaController::class,'create'])->name('admin/categorias/create');
    Route::post('/admin/categorias/save',[CategoriaController::class, 'save'])->name('admin/categorias/save');
    Route::get('/admin/categorias/edit/{id}',[CategoriaController::class, 'edit'])->name('admin/categorias/edit');
    Route::get('/categorias/{id}', [CategoriaController::class, 'show'])->name('categoria.show');
    Route::put('/admin/categorias/edit/{id}',[CategoriaController::class, 'update'])->name('admin/categorias/update');
    Route::get('/admin/categorias/delete/{id}',[CategoriaController::class, 'delete'])->name('admin/categorias/delete');

});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// routes/web.php

Route::get('/pagina-confirmacion', function () {
    return view('confirmacion_compra'); // Ejemplo: redirigir a una vista de confirmación
})->name('pagina_confirmacion');

// routes/web.php

Route::get('/carrito', function () {
    return view('carrito'); // Ajusta la vista según sea necesario
})->name('carrito');
Route::get('/carrito', [CarritoController::class, 'mostrarCarrito'])->name('carrito');
Route::post('/confirmacion_compra', [CompraController::class, 'confirmacionCompra'])->name('confirmacion_compra');
Route::post('/confirmacion_compra', [CompraController::class, 'confirmacionCompra'])->name('confirmacion_compra');
Route::delete('/comprador/{id}', [CompraController::class, 'eliminar'])->name('eliminar.comprador');


Route::get('/admin/compras', [CompraController::class, 'index'])->name('admin.compras.index');


Route::get('/carrito', [CarritoController::class, 'mostrarCarrito'])->name('carrito');
Route::get('/formulario_compra', [CarritoController::class, 'formularioCompra'])->name('formulario_compra');
Route::post('/realizar_compra', [CarritoController::class, 'realizarCompra'])->name('realizar_compra');
Route::get('/confirmacion_compra/{comprador}', [CarritoController::class, 'confirmacionCompra'])->name('confirmacion_compra');



Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');



Route::prefix('admin')->group(function () {
    Route::delete('/users/{id}', 'App\Http\Controllers\UserController@destroy')->name('admin.users.destroy');
});


require __DIR__.'/auth.php';
//Route::get('admin/dashboard', [HomeController::class,'index'])->middleware(['auth','admin']);