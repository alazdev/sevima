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
Route::get('/auth/google/redirect', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider']);
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'cekLevel:1 2'], function(){
    Route::get('/', [App\Http\Controllers\Admin\DasborController::class, 'index'])->name('index');
    Route::group(['prefix'=>'data','as'=>'data.'], function(){
        Route::get('/pie-chart', [App\Http\Controllers\Admin\DasborController::class, 'pieChart'])->name('pie-chart');
        Route::get('/widget', [App\Http\Controllers\Admin\DasborController::class, 'widget'])->name('widget');
        Route::get('/bar-chart', [App\Http\Controllers\Admin\DasborController::class, 'barChart'])->name('bar-chart');
    });

    // START Menu Modul
    Route::group(['prefix'=>'modul','as'=>'modul.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\ModulController::class, 'index'])->name('index');
        Route::post('/data', [App\Http\Controllers\Admin\ModulController::class, 'data'])->name('data');
        Route::get('/{id}/detail', [App\Http\Controllers\Admin\ModulController::class, 'show'])->name('show');
    });
    // END Menu Modul

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
        Route::put('/{id}/atur-ulang-kata-sandi', [App\Http\Controllers\Admin\MentorController::class, 'resetPassword'])->name('reset-password');
        Route::delete('/{id}/hapus', [App\Http\Controllers\Admin\MentorController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix'=>'siswa','as'=>'siswa.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\SiswaController::class, 'index'])->name('index');
        Route::post('/data', [App\Http\Controllers\Admin\SiswaController::class, 'data'])->name('data');
    });
    // END Menu Pengguna

    // STAR Menu Master Data
    Route::group(['prefix'=>'jenjang','as'=>'status.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\StatusController::class, 'index'])->name('index');
        Route::group(['prefix'=>'{id_status}/mata-pelajaran','as'=>'mata-pelajaran.'], function(){
            Route::get('/', [App\Http\Controllers\Admin\MataPelajaranController::class, 'index'])->name('index');
            Route::post('/data', [App\Http\Controllers\Admin\MataPelajaranController::class, 'data'])->name('data');
            Route::post('/tambah', [App\Http\Controllers\Admin\MataPelajaranController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\MataPelajaranController::class, 'edit'])->name('edit');
            Route::put('/{id}/ubah', [App\Http\Controllers\Admin\MataPelajaranController::class, 'update'])->name('update');
            Route::delete('/{id}/hapus', [App\Http\Controllers\Admin\MataPelajaranController::class, 'destroy'])->name('destroy');
        });
        Route::get('/{id}/detail', [App\Http\Controllers\Admin\StatusController::class, 'show'])->name('show');
    });

    Route::group(['prefix'=>'kategori','as'=>'kategori.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('index');
        Route::post('/data', [App\Http\Controllers\Admin\KategoriController::class, 'data'])->name('data');
        Route::post('/tambah', [App\Http\Controllers\Admin\KategoriController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [App\Http\Controllers\Admin\KategoriController::class, 'edit'])->name('edit');
        Route::put('/{id}/ubah', [App\Http\Controllers\Admin\KategoriController::class, 'update'])->name('update');
        Route::delete('/{id}/hapus', [App\Http\Controllers\Admin\KategoriController::class, 'destroy'])->name('destroy');
    });
    // END Menu Master Data
});

Route::group(['prefix'=>'mentor','as'=>'mentor.','middleware'=>'cekLevel:3'], function(){
    Route::group(['prefix'=>'data','as'=>'data.'], function(){
        Route::get('/kelas', [App\Http\Controllers\Mentor\MentorController::class, 'kelas'])->name('kelas');
        Route::get('/mata-pelajaran', [App\Http\Controllers\Mentor\MentorController::class, 'mataPelajaran'])->name('mata-pelajaran');
        Route::get('/kategori', [App\Http\Controllers\Mentor\MentorController::class, 'kategori'])->name('kategori');
    });
    Route::group(['prefix'=>'modul','as'=>'modul.'], function(){
        Route::get('/', [App\Http\Controllers\Mentor\ModulController::class, 'index'])->name('index');
        Route::post('/data', [App\Http\Controllers\Mentor\ModulController::class, 'data'])->name('data');
        Route::post('/tambah', [App\Http\Controllers\Mentor\ModulController::class, 'store'])->name('store');
        Route::get('/{id}/detail', [App\Http\Controllers\Mentor\ModulController::class, 'show'])->name('show');
        Route::group(['prefix'=>'{id_modul}/sub-modul','as'=>'sub-modul.'], function(){
            Route::get('/', [App\Http\Controllers\Mentor\SubModulController::class, 'index'])->name('index');
            Route::post('/data', [App\Http\Controllers\Mentor\SubModulController::class, 'data'])->name('data');
            Route::post('/tambah', [App\Http\Controllers\Mentor\SubModulController::class, 'store'])->name('store');
            Route::delete('/{id}/hapus', [App\Http\Controllers\Mentor\SubModulController::class, 'destroy'])->name('destroy');
            Route::group(['prefix'=>'{id_sub_modul}/materi','as'=>'materi.'], function(){
                Route::get('/', [App\Http\Controllers\Mentor\MateriModulController::class, 'index'])->name('index');
                Route::post('/data', [App\Http\Controllers\Mentor\MateriModulController::class, 'data'])->name('data');
                Route::post('/tambah', [App\Http\Controllers\Mentor\MateriModulController::class, 'store'])->name('store');
                Route::delete('/{id}/hapus', [App\Http\Controllers\Mentor\MateriModulController::class, 'destroy'])->name('destroy');
            });
        });
        Route::delete('/{id}/hapus', [App\Http\Controllers\Mentor\ModulController::class, 'destroy'])->name('destroy');
    });
});

Route::group(['prefix'=>'siswa','as'=>'siswa.','middleware'=>'cekLevel:4'], function(){
    Route::get('/{id}/ambil-modul', [App\Http\Controllers\Siswa\AmbilModulController::class, 'ambilModul'])->name('ambil-modul');
    Route::group(['prefix'=>'ambil-modul','as'=>'ambil-modul.'], function(){
        Route::get('/', [App\Http\Controllers\Siswa\AmbilModulController::class, 'index'])->name('index');
        Route::post('/data', [App\Http\Controllers\Siswa\AmbilModulController::class, 'data'])->name('data');
        Route::get('/{id}/detail', [App\Http\Controllers\Siswa\AmbilModulController::class, 'show'])->name('show');
    });
});