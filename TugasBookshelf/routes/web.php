<?php


use App\Http\Controllers\BookController;
use App\Http\Controllers\BookshelfController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

//book controller show
Route::middleware('auth')->group(function () {
    Route::get('/book', [BookController::class, 'index'])->name('book');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/book/export', [BookController::class, 'export'])->name('book.export');
    Route::post('/book/import', [BookController::class, 'import'])->name('book.import');
    Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name('book.edit'); //{id} untuk data yg idnya mana yg dikirim
    Route::patch('/book/update/{id}', [BookController::class, 'update'])->name('book.update'); //patch untuk diperbarui
    Route::delete('/book/delete/{id}', [BookController::class, 'destroy'])->name('book.destroy');
    Route::get('/book/print', [BookController::class, 'print'])->name('book.print');
    });
//post untuk upload data

//bookshelf routes
Route::middleware('auth')->group(function () {
    Route::get('/bookshelf', [BookshelfController::class, 'index'])->name('bookshelf');
    Route::get('/shelf-create', [BookshelfController::class, 'create'])->name('shelf.create');
    Route::post('/shelf-store', [BookshelfController::class, 'store'])->name('shelf.store');
    Route::get('/bookshelf/edit/{id}', [BookshelfController::class, 'edit'])->name('shelf.edit');
    Route::patch('/bookshelf/update/{id}', [BookshelfController::class, 'update'])->name('shelf.update');
    Route::delete('/bookshelf/delete/{id}', [BookshelfController::class, 'destroy'])->name('shelf.destroy');
    });

require __DIR__.'/auth.php';
