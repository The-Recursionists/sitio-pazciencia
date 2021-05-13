<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/lecciones/{id}', [App\Http\Controllers\LessonController::class, 'show'])->name('lessons.show');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    // these are in spanish because they are public
	Route::get('lecciones', [LessonController::class, 'index'])->name('lessons');
    // shows lesson creation form
	Route::get('lecciones/crear', [LessonController::class, 'create'])->name('lessons.create');
    // stores created lesson
	Route::post('lecciones/crear', [LessonController::class, 'store'])->name('lessons.store');
    // shows lesson modification form
	Route::get('lecciones/{id}/editar', [LessonController::class, 'edit'])->name('lessons.edit');
    // updates existing lesson record
	Route::post('lecciones/{id}/editar', [LessonController::class, 'update'])->name('lessons.update');
});
