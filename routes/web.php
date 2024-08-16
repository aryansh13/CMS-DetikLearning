<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainingTopicController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\UserTrainingTopicController;
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

Route::middleware(['auth', 'check.usertype:user'])->group(function () {
    Route::get('/', [UserTrainingTopicController::class, 'index']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'check.usertype:admin'])->group(function () {
    Route::get('adminPage/dashboardAdmin', [TrainingTopicController::class, 'index'])->name('admin.dashboard');
    Route::post('adminPage/store', [TrainingTopicController::class, 'store'])->name('admin.store');
    Route::put('adminPage/update/{id}', [TrainingTopicController::class, 'update'])->name('admin.update');
    Route::delete('adminPage/delete/{id}', [TrainingTopicController::class, 'destroy'])->name('admin.delete');
    Route::get('adminPage/division', [DivisionController::class, 'index'])->name('admin.division');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
