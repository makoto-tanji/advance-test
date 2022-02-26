<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
Route::get('/', [ContactController::class, 'index']);
Route::get('/confirmation', [ContactController::class, 'confirm']);
Route::post('/confirmation', [ContactController::class, 'store']);
Route::get('/thanks', [ContactController::class, 'thanks']);
// Route::get('/management', [ContactController::class, 'management']);
// Route::post('/management', [ContactController::class, 'search']);
Route::get('/management', [ContactController::class, 'search']);
Route::post('/delete', [ContactController::class, 'delete']);