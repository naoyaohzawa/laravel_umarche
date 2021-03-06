<?php

use Illuminate\Support\Facades\Route;

// 以下追加
use App\Http\Controllers\Owner\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Owner\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Owner\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Owner\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Owner\Auth\NewPasswordController;
use App\Http\Controllers\Owner\Auth\PasswordResetLinkController;
use App\Http\Controllers\Owner\Auth\RegisteredUserController;
use App\Http\Controllers\Owner\Auth\VerifyEmailController;
use App\Http\Controllers\Owner\ShipsController;
use App\Http\Controllers\Owner\VoyagesController;
use App\Http\Controllers\Owner\ImagesController;
use App\Http\Controllers\Owner\DocumentsController;

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
    return view('top');
});

// shipsのフォルダ
Route::resource('ships', ShipsController::class)
    ->middleware('auth:owners');

// voyagesのフォルダ
Route::resource('voyages', VoyagesController::class)
    ->middleware('auth:owners');


// 画像保存
Route::resource('images', ImagesController::class)
    ->middleware('auth:owners');

// 書類の独自メソッド
Route::get('voyages/documents/{$id}/general_declaration', [DocumentsController::class, 'general'])->name('general_declaration');

// 書類
Route::resource('documents', DocumentsController::class)
->middleware('auth:owners');


Route::get('/dashboard', function () {
    return view('owner.dashboard');
})->middleware(['auth:owners'])->name('dashboard');

// Route::prefix('ships')->middleware('auth:owners')->group(function () {
//     Route::get('index', [ShipsController::class,'index'])->name('ships.index');
//     Route::get('edit{ships}', [ShipsController::class,'edit'])->name('ships.edit');
//     Route::post('destroy{ships}',[ShipsController::class, 'destroy'])->name('ships.destroy');
// });



Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth:owners')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth:owners', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth:owners', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth:owners')
    ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('authd:owners');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:owners')
    ->name('logout');
