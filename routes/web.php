<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CastsController;

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
Route::get('casts',[CastsController::class,'index'])->name('casts.index');
Route::delete('casts/{id}', [CastsController::class, 'delete'])->name('casts.delete');
Route::get('casts/restore/one/{id}', [CastsController::class, 'restore'])->name('casts.restore');
Route::get('casts/restore_all', [CastsController::class, 'restore_all'])->name('casts.restore_all');
