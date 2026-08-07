<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/modul', [HomeController::class, 'modul'])->name('modul');
Route::get('/download', [HomeController::class, 'download'])->name('download');

// =====================
// PUBLIC: Kegiatan
// =====================
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::get('/kegiatan/{id}', [KegiatanController::class, 'show'])->name('kegiatan.show');

// =====================
// ADMIN: Auth
// =====================
Route::get('/admin/login', [KegiatanController::class, 'adminLoginForm'])->name('admin.login');
Route::post('/admin/login', [KegiatanController::class, 'adminLogin'])->name('admin.login.post');
Route::post('/admin/logout', [KegiatanController::class, 'adminLogout'])->name('admin.logout');

// =====================
// ADMIN: Kegiatan CRUD
// =====================
Route::get('/admin/kegiatan', [KegiatanController::class, 'adminIndex'])->name('admin.kegiatan.index');
Route::get('/admin/kegiatan/create', [KegiatanController::class, 'adminCreate'])->name('admin.kegiatan.create');
Route::post('/admin/kegiatan', [KegiatanController::class, 'adminStore'])->name('admin.kegiatan.store');
Route::get('/admin/kegiatan/{id}/edit', [KegiatanController::class, 'adminEdit'])->name('admin.kegiatan.edit');
Route::put('/admin/kegiatan/{id}', [KegiatanController::class, 'adminUpdate'])->name('admin.kegiatan.update');
Route::delete('/admin/kegiatan/{id}', [KegiatanController::class, 'adminDelete'])->name('admin.kegiatan.delete');
