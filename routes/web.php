<?php

use Illuminate\Support\Facades\Route;

// テスト用
use App\Http\Controllers\ComponentTestController;
use App\Http\Controllers\LifecycleTestController;
use App\Http\Controllers\Owner\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Owner\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Owner\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Owner\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Owner\Auth\NewPasswordController;
use App\Http\Controllers\Owner\Auth\PasswordResetLinkController;
use App\Http\Controllers\Owner\Auth\RegisteredUserController;
use App\Http\Controllers\Owner\Auth\VerifyEmailController;
use App\Http\Controllers\User\VoyagesController;
use App\Http\Controllers\TopController;

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

Route::get('top', function () {
    return view('top');
});

Route::get('login_for_all', function () {
    return view('login_for_all');
});

// Route::get('/login_for_all', 'TopController@index');

// Route::get('/', function () {
//     return view('user.welcome');
// });

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');

// voyagesのフォルダ
Route::resource('voyages', VoyagesController::class)
    ->middleware('auth:users');

require __DIR__.'/auth.php';




// テスト用です
// Route::get('/component-test1', [ComponentTestController::class, 'showComponent1']);
// Route::get('/component-test2', [ComponentTestController::class, 'showComponent2']);
// Route::get('/servicecontainer', [LifecycleTestController::class, 'showServiceContainerTest']);
// Route::get('/serviceprovider', [LifecycleTestController::class, 'showServiceProviderTest']);