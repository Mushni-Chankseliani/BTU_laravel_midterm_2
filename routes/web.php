<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\SinglePageController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::resource('/blogs', BlogsController::class)->except('show', 'create');
    Route::post('/blogs/delete', [BlogsController::class, 'delete'])->name('blogs.delete');
});

Auth::routes();
