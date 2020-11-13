<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/user/ssh-keys', function () {
    return Inertia\Inertia::render('Profile/SSHKeys');
})->name('ssh-keys');

Route::middleware(['auth:sanctum', 'verified'])->get('/user/dns-providers', function () {
    return Inertia\Inertia::render('Profile/DNSProviders');
})->name('dns-providers');

Route::middleware('auth:sanctum')->post('/addssh', 'App\Http\Controllers\SSHController@store');
