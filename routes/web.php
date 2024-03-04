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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('items', ItemController::class);
//Ruta a metodo delete
Route::delete('/items/delete/{id}', 'App\Http\Controllers\ItemController@destroy')->name('items.delete');

Route::resource('boxes', BoxController::class);
//Ruta a metodo delete
Route::delete('/boxes/delete/{id}', 'App\Http\Controllers\BoxController@destroy')->name('boxes.delete');

Route::resource('loans', LoanController::class);

//Ruta a metodo create con un id
Route::get('/loans/create/{id}', 'App\Http\Controllers\LoanController@create')->name('loans.create');

//Ruta a metodo index del controlador de items
// Route::get('/items', 'App\Http\Controllers\ItemController@index')->name('items.index');

require __DIR__.'/auth.php';