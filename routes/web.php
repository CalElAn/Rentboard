<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\FilePondController;


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

Route::get('/', [PropertyController::class, 'index']);

Route::get('/add-property', [PropertyController::class, 'create']);
Route::post('/add-property', [PropertyController::class, 'store']);

Route::post('/filepond/process', [FilePondController::class, 'process']);
Route::delete('/filepond/revert', [FilePondController::class, 'revert']);

Route::post('keep-csrf-token-alive', function() {
    return 'Token must have been valid, and the session expiration has been extended.';//https://stackoverflow.com/q/31449434/470749
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
