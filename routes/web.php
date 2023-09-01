<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;

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

Auth::routes();

Route::get('/', [NoteController::class, 'shared'])->name('welcome');

Route::middleware('auth')->group(function () {
    Route::resource('notes', NoteController::class)->only(['index', 'store', 'destroy']);
    Route::patch('/notes/{id}', [NoteController::class, 'share'])->name('notes.share');
});
