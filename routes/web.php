<?php

use Illuminate\Support\Facades\Route;

// テスト用
use App\Http\Controllers\ComponentTestController;
use App\Http\Controllers\LifecycleTestController;

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
    return view('user.welcome');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users'])->name('dashboard');

require __DIR__.'/auth.php';

// テスト用です
Route::get('/component-test1', [ComponentTestController::class, 'showComponent1']);
Route::get('/component-test2', [ComponentTestController::class, 'showComponent2']);
Route::get('/servicecontainer', [LifecycleTestController::class, 'showServiceContainerTest']);
Route::get('/serviceprovider', [LifecycleTestController::class, 'showServiceProviderTest']);