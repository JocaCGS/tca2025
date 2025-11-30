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

Route::get('/image/{id}', [UploadController::class, 'show'])->name('image.show');

Route::get('userimages', [UploadController::class, 'userImages'])
    ->middleware('auth')
    ->name('userimages');

Route::delete('/image/{id}', [UploadController::class, 'destroy'])
    ->middleware('auth')
    ->name('upload.destroy');

Route::get('/imageedit/{id}', [UploadController::class, 'edit'])
    ->middleware('auth')
    ->name('imageedit');


Route::post('/update/{id}', [UploadController::class, 'update'])
    ->middleware('auth')
->name('upload.update');  

Route::get('/search', [UploadController::class, 'search'])
    ->middleware('auth')
    ->name('upload.search');

Route::get('makepdf/{id}', [UploadController::class, 'makepdf'])
    ->middleware('auth')
    ->name('upload.makepdf');






require __DIR__.'/auth.php';

//Route::get('/dashboard', function () {
  //  return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
