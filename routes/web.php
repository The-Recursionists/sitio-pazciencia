<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\AreaController;
use App\Models\Lesson;
use App\Models\Area;

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



Route::get('/', function () { return view('pages.welcome'); })->name('homepage');
Route::get('/lección/{id}', [LessonController::class, 'show'])->name('lesson.public');
Route::get('/lista-lecciones', [LessonController::class, 'list'])->name('lessons.list');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    Route::get('areas', [AreaController::class, 'index'])->name('areas.index');
    Route::get('areas/crear', [AreaController::class, 'create'])->name('areas.create');
    Route::post('areas/crear', [AreaController::class, 'store'])->name('areas.store');
    Route::get('areas/{area:id}/editar', [AreaController::class, 'edit'])->name('areas.edit');
    Route::post('areas/{area:id}/editar', [AreaController::class, 'update'])->name('areas.update');
    Route::delete('areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');

    // these are in spanish because they are public
    Route::get('lecciones/publicadas', [LessonController::class, 'index'])->name('lessons');
    // shows lesson creation form
    Route::get('lecciones/crear', [LessonController::class, 'create'])->name('lessons.create');
    // stores created lesson
    Route::post('lecciones/crear', [LessonController::class, 'store'])->name('lessons.store');
    // shows lesson modification form
    Route::get('lecciones/{id}/editar', [LessonController::class, 'edit'])->name('lessons.edit');
    // updates existing lesson record
    Route::post('lecciones/{id}/editar', [LessonController::class, 'update'])->name('lessons.update');
    // delete existing lesson
    Route::delete('lecciones/{id}', [LessonController::class, 'destroy'])->name('lessons.destroy');
    // show lessons created by the user
    Route::get('lecciones/mis-lecciones', [LessonController::class, 'getUserLessons'])->name('lessons.user_lessons');
    // show the list of lessons pending to approve
    Route::get('lecciones/pendientes', [LessonController::class, 'getPendingLessons'])->name('lessons.pending_lessons');
    // gives timestamp when a lesson is approved
    Route::post('approve_lesson/{id}', [LessonController::class, 'approveLesson'])->name('lessons.approve_lesson');
    // rejects a lesson and append a comment to its status
    Route::post('reject_lesson/{id}', [LessonController::class, 'rejectLesson'])->name('lessons.reject_lesson');
});
