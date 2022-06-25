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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'auth'], function(){
    Route::get('/', [App\Http\Controllers\Admin\DasborController::class, 'index'])->name('index');
    Route::group(['prefix'=>'data','as'=>'data.'], function(){
        Route::get('/pie-chart', [App\Http\Controllers\Admin\DasborController::class, 'pieChart'])->name('pie-chart');
        Route::get('/widget', [App\Http\Controllers\Admin\DasborController::class, 'widget'])->name('widget');
        Route::get('/bar-chart', [App\Http\Controllers\Admin\DasborController::class, 'barChart'])->name('bar-chart');
    });

    // START Menu Pengguna
    Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');
        Route::post('/data', [App\Http\Controllers\Admin\AdminController::class, 'data'])->name('data');
        Route::post('/tambah', [App\Http\Controllers\Admin\AdminController::class, 'store'])->name('store');
        Route::put('/{id}/atur-ulang-kata-sandi', [App\Http\Controllers\Admin\AdminController::class, 'resetPassword'])->name('reset-password');
        Route::delete('/{id}/hapus', [App\Http\Controllers\Admin\AdminController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix'=>'mentor','as'=>'mentor.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\MentorController::class, 'index'])->name('index');
        Route::post('/data', [App\Http\Controllers\Admin\MentorController::class, 'data'])->name('data');
        Route::post('/tambah', [App\Http\Controllers\Admin\MentorController::class, 'store'])->name('store');
        Route::get('/{id}/detail', [App\Http\Controllers\Admin\MentorController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [App\Http\Controllers\Admin\MentorController::class, 'edit'])->name('edit');
        Route::put('/{id}/ubah', [App\Http\Controllers\Admin\MentorController::class, 'update'])->name('update');
        Route::delete('/{id}/hapus', [App\Http\Controllers\Admin\MentorController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix'=>'siswa','as'=>'siswa.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\SiswaController::class, 'index'])->name('index');
        Route::post('/data', [App\Http\Controllers\Admin\SiswaController::class, 'data'])->name('data');
        Route::get('/{id}/detail', [App\Http\Controllers\Admin\SiswaController::class, 'show'])->name('show');
    });
    // END Menu Pengguna

    Route::group(['prefix'=>'status','as'=>'status.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\StatusController::class, 'index'])->name('index');
        Route::post('/data', [App\Http\Controllers\Admin\StatusController::class, 'data'])->name('data');
        Route::post('/tambah', [App\Http\Controllers\Admin\StatusController::class, 'store'])->name('store');
        Route::get('/{id}/detail', [App\Http\Controllers\Admin\StatusController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [App\Http\Controllers\Admin\StatusController::class, 'edit'])->name('edit');
        Route::put('/{id}/ubah', [App\Http\Controllers\Admin\StatusController::class, 'update'])->name('update');
        Route::delete('/{id}/hapus', [App\Http\Controllers\Admin\StatusController::class, 'destroy'])->name('destroy');
    });
});