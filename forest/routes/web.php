<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZooController as Zoo;
use App\Http\Controllers\CalcController as Calc;
use App\Http\Controllers\PostController as PC;
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

Route:: get('/zoo', fn() => 'Sveiki');
Route::get('/zoo/enter/{id}/{id2}', [Zoo::class, 'enter']);
Route::get('/zoo/exit', fn() => 'Ate');

Route:: get('/zoo/show/{number}', [Zoo::class, 'showAnimal'])->name('animalistic');

Route::get('/calc/{x}/{y}', [Calc::class, 'do']);

Route:: get('/do-sum', [PC::class, 'showForm'])->name('show-form');
Route:: post('/do-sum', [PC::class, 'doForm'])->name('do-form');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
