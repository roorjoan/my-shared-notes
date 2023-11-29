<?php

use App\Http\Controllers\API\NoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/notes', [NoteController::class, 'allNotes']);
Route::get('/notes/shared', [NoteController::class, 'sharedNotes']);
//Route::post('/notes', [NoteController::class, 'storeNote']);
Route::patch('/notes/{id}', [NoteController::class, 'shareNote']);
Route::delete('/notes/{id}', [NoteController::class, 'destroyNote']);
