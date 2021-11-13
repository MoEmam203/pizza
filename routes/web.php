<?php

use App\Http\Controllers\PizzaController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Pizzas CRUD
// Route::get('/pizzas', [PizzaController::class,'index'])->name("pizzas.index");
// Route::get('/pizzas/create', [PizzaController::class,'create'])->name("pizzas.create");
// Route::post("/pizzas",[PizzaController::class,'store'])->name("pizzas.store");
// Route::get('/pizzas/{pizza}/edit',[PizzaController::class,'edit'])->name('pizzas.edit');
// Route::put('/pizzas/{pizza}/update',[PizzaController::class,'update'])->name('pizzas.update');
// Route::delete('/pizzas/{pizza}/delete',[PizzaController::class,'destroy'])->name('pizzas.destroy');

Route::resource('pizzas', PizzaController::class)->middleware(['auth','admin'])->except('show');