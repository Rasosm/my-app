<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController as C;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('admin/customers')->name('customers-')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index');
    Route::get('/create', [C::class, 'create'])->name('create');
    Route::post('/create', [C::class, 'store'])->name('store');
    Route::get('/edit/{customer}', [C::class, 'edit'])->name('edit');
    Route::put('/edit/{customer}', [C::class, 'update'])->name('update');
    Route::get('/add/{customer}', [C::class, 'add'])->name('add');
    Route::put('/updateAdd/{customer}', [C::class, 'updateAdd'])->name('updateAdd');
    Route::get('/transfer/{customer}', [C::class, 'transfer'])->name('transfer');
    Route::put('/updateTransfer/{customer}', [C::class, 'updateTransfer'])->name('updateTransfer');
    Route::delete('/delete/{customer}', [C::class, 'destroy'])->name('delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
