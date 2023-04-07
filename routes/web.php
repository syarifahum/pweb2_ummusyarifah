<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\mahasiswaController;
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

//Route::get('/login', ProfileController::class );

Route::get('/', function () {
    return view('welcome');
});

Route::resource('mahasiswa',mahasiswaController::class);

// Route::resource('mahasiswa/create', function (){
//     return view('layout.basic');
// });

Route::get('/create', function () {
    return view('layout.basic');
});




Route::get('/dashboard', function () {
    return view('layout.tampilan');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/layout.tampilan', function () {
    return view('layout.tampilan');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
