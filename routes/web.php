<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [\App\Http\Controllers\Main\AdminController::class, 'index'])->name('main.index');

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [\App\Http\Controllers\Category\CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [\App\Http\Controllers\Category\CategoryController::class, 'create'])->name('category.create');
    Route::post('/', [\App\Http\Controllers\Category\CategoryController::class, 'store'])->name('category.store');
    Route::get('/{category}/edit', [\App\Http\Controllers\Category\CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/{category}', [\App\Http\Controllers\Category\CategoryController::class, 'show'])->name('category.show');
    Route::patch('/{category}', [\App\Http\Controllers\Category\CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{category}', [\App\Http\Controllers\Category\CategoryController::class, 'delete'])->name('category.delete');
});

Route::group(['prefix' => 'tags'], function () {
    Route::get('/', [\App\Http\Controllers\Tag\TagController::class, 'index'])->name('tag.index');
    Route::get('/create', [\App\Http\Controllers\Tag\TagController::class, 'create'])->name('tag.create');
    Route::post('/', [\App\Http\Controllers\Tag\TagController::class, 'store'])->name('tag.store');
    Route::get('/{tag}/edit', [\App\Http\Controllers\Tag\TagController::class, 'edit'])->name('tag.edit');
    Route::get('/{tag}', [\App\Http\Controllers\Tag\TagController::class, 'show'])->name('tag.show');
    Route::patch('/{tag}', [\App\Http\Controllers\Tag\TagController::class, 'update'])->name('tag.update');
    Route::delete('/{tag}', [\App\Http\Controllers\Tag\TagController::class, 'delete'])->name('tag.delete');
});

Route::group(['prefix' => 'colors'], function () {
    Route::get('/', [\App\Http\Controllers\Color\ColorController::class, 'index'])->name('color.index');
    Route::get('/create', [\App\Http\Controllers\Color\ColorController::class, 'create'])->name('color.create');
    Route::post('/', [\App\Http\Controllers\Color\ColorController::class, 'store'])->name('color.store');
    Route::get('/{color}/edit', [\App\Http\Controllers\Color\ColorController::class, 'edit'])->name('color.edit');
    Route::get('/{color}', [\App\Http\Controllers\Color\ColorController::class, 'show'])->name('color.show');
    Route::patch('/{color}', [\App\Http\Controllers\Color\ColorController::class, 'update'])->name('color.update');
    Route::delete('/{color}', [\App\Http\Controllers\Color\ColorController::class, 'delete'])->name('color.delete');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [\App\Http\Controllers\User\UserController::class, 'index'])->name('user.index');
    Route::get('/create', [\App\Http\Controllers\User\UserController::class, 'create'])->name('user.create');
    Route::post('/', [\App\Http\Controllers\User\UserController::class, 'store'])->name('user.store');
    Route::get('/{user}/edit', [\App\Http\Controllers\User\UserController::class, 'edit'])->name('user.edit');
    Route::get('/{user}', [\App\Http\Controllers\User\UserController::class, 'show'])->name('user.show');
    Route::patch('/{user}', [\App\Http\Controllers\User\UserController::class, 'update'])->name('user.update');
    Route::delete('/{user}', [\App\Http\Controllers\User\UserController::class, 'delete'])->name('user.delete');
});
