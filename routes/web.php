<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SpecializationController;
use App\Http\Controllers\Admin\SponsorController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/profiles', ProfileController::class)->except('destroy', 'create', 'store', 'index');
    Route::get('/specialization', [SpecializationController::class, 'index'])->name('specialization');
    Route::get('/sponsors', [SponsorController::class, 'index'])->name('sponsor');
    Route::get('/sponsors/{sponsor}', [SponsorController::class, 'show'])->name('sponsor.show');
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::get('/feedback/{feedback}', [FeedbackController::class, 'show'])->name('feedback.show');
    Route::get('/messages', [MessageController::class, 'index'])->name('message');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('message.show');
});

require __DIR__ . '/auth.php';
