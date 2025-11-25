<?php

use App\Http\Controllers\UploadController;


Route::get('/', function () {
    return redirect('/login');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('/upload', function () {
    return view('upload');
})->middleware('auth')->name('upload');

Route::post('/upload', [UploadController::class, 'store'])
    ->middleware('auth')
    ->name('upload.store');

Route::get('/home', [UploadController::class, 'index'])
    ->middleware('auth')
    ->name('home');




require __DIR__.'/auth.php';

//Route::get('/dashboard', function () {
  //  return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
