<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(
    function () {
        Route::get(
            '/tags',
            [
                TagController::class,
                'index'
            ]
        )->name('tags.index');

        Route::get(
            '/tags/create',
            [
                TagController::class,
                'create'
            ]
        )->name('tags.create');
        Route::post(
            '/tags',
            [
                TagController::class,
                'store'
            ]
        )->name('tags.store');

        Route::get(
            '/tags/{tag}/edit',
            [
                TagController::class,
                'edit'
            ]
        )->name('tags.edit');

        Route::patch(
            '/tags/{tag}',
            [
                TagController::class,
                'update'
            ]

        )->name('tags.update');

        Route::delete(
            '/tags/{tag}',
            [
                TagController::class,
                'destroy'
            ]
        )->name('tags.delete');
    }
);
