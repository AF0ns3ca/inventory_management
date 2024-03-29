<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\LoanController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//Ruta a metodo index del controlador de items con usuario autentificado
Route::get('/items', 'App\Http\Controllers\ItemController@index')->middleware(['auth', 'verified'])->name('items.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('items', ItemController::class)->middleware(['auth', 'verified']);
//Ruta a metodo delete
Route::delete('/items/delete/{id}', 'App\Http\Controllers\ItemController@destroy')->name('items.delete')->middleware(['auth', 'verified']);

Route::resource('boxes', BoxController::class)->middleware(['auth', 'verified']);
//Ruta a metodo delete
Route::delete('/boxes/delete/{id}', 'App\Http\Controllers\BoxController@destroy')->name('boxes.delete')->middleware(['auth', 'verified']);

Route::resource('loans', LoanController::class)->middleware(['auth', 'verified']);

//Ruta a metodo create con un id
Route::get('/loans/create/{id}', 'App\Http\Controllers\LoanController@create')->name('loans.create')->middleware(['auth', 'verified']);

// Ruta a metodo edit con un id
Route::get('/loans/edit/{id}', 'App\Http\Controllers\LoanController@edit')->name('loans.edit')->middleware(['auth', 'verified']);

//Ruta a metodo return con un id
Route::get('/loans/return/{id}', 'App\Http\Controllers\LoanController@return')->name('loans.return')->middleware(['auth', 'verified']);

//Ruta a metodo index del controlador de items
// Route::get('/items', 'App\Http\Controllers\ItemController@index')->name('items.index');

require __DIR__.'/auth.php';
