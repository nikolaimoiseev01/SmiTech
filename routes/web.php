<?php

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

Route::get('/', [\App\Http\Controllers\Controller::class, 'main_page'])
    ->name('portal.index');

Route::get('post/{post_id}', [\App\Http\Controllers\Controller::class, 'post_page'])
    ->name('portal.post_page');

Route::get('topic/{topic_id}', [\App\Http\Controllers\Controller::class, 'topic_page'])
    ->name('portal.topic_page');


Route::view('dashboard', 'pages.account.index')
    ->middleware(['auth', 'verified'])
    ->name('account.index');



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
