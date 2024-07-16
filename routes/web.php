<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomBookingController;
use App\Http\Controllers\NewsController; // Tambahkan ini

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

Route::get('/', [PublicController::class, 'index']);
Route::get('room-list', [RoomController::class, 'list']);
Route::get('/news', [NewsController::class, 'index'])->name('news.index');



Route::middleware('only_guest')->group(function() {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('profile', [UserController::class, 'profile'])->middleware(['auth', 'only_client']);
    Route::get('room-booking', [RoomBookingController::class, 'index']);
    Route::post('room-booking', [RoomBookingController::class, 'store']);
    Route::get('room-return', [RoomBookingController::class, 'returnRoom']);
    Route::post('room-return', [RoomBookingController::class, 'saveReturnRoom']);
    // Rute untuk mengedit dan memperbarui profil pengguna
    Route::get('profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update', [UserController::class, 'update'])->name('profile.update');
    Route::get('/users/{slug}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{slug}/update', [UserController::class, 'update'])->name('users.update');

    Route::middleware('only_admin')->group(function() {
        Route::get('dashboard', [DashboardController::class, 'index']);

        Route::get('rooms', [RoomController::class, 'index']);
        Route::get('room-add', [RoomController::class, 'add']);
        Route::post('room-add', [RoomController::class, 'store']);
        Route::get('room-edit/{slug}', [RoomController::class, 'edit']);
        Route::post('room-edit/{slug}', [RoomController::class, 'update']);
        Route::get('room-delete/{slug}', [RoomController::class, 'delete']);
        Route::get('room-destroy/{slug}', [RoomController::class, 'destroy']);
        Route::get('room-deleted', [RoomController::class, 'deletedRoom']);
        Route::get('room-restore/{slug}', [RoomController::class, 'restore']);

        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('category-add', [CategoryController::class, 'add']);
        Route::post('category-add', [CategoryController::class, 'store']);
        Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
        Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']);
        Route::get('category-deleted', [CategoryController::class, 'deletedCategory']);
        Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);

        Route::get('users', [UserController::class, 'index']);
        Route::get('registered-users', [UserController::class, 'registeredUser']);
        Route::get('user-detail/{slug}', [UserController::class, 'show']);
        Route::get('user-edit/{slug}', [UserController::class, 'edit']);
        Route::post('user-edit/{slug}', [UserController::class, 'update']);
        Route::get('user-approve/{slug}', [UserController::class, 'approve']);
        Route::get('user-ban/{slug}', [UserController::class, 'delete']);
        Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);
        Route::get('user-banned', [UserController::class, 'bannedUser']);
        Route::get('user-restore/{slug}', [UserController::class, 'restore']);

        Route::get('booking', [BookingController::class, 'index'])->name('booking.index');
        Route::get('laporanpdf', [LaporanController::class, 'index']);
        Route::get('/export-pdf', [LaporanController::class, 'exportPDF'])->name('export-pdf');
        Route::post('/export-pdf', [LaporanController::class, 'exportPdf'])->name('export.pdf');


        Route::get('admin-room-return', [RoomBookingController::class, 'adminReturnRoom']);
        Route::post('admin-room-return', [RoomBookingController::class, 'saveAdminReturnRoom']);


        // Tambahkan route untuk berita
        Route::get('/news', [NewsController::class, 'index'])->name('news.index');
        Route::get('/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/store', [NewsController::class, 'store'])->name('news.store');
        Route::get('/admin-news', [NewsController::class, 'adminIndex'])->name('admin.news.index'); // Tambahkan ini
        Route::get('/admin-news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
        Route::post('/admin-news/update/{id}', [NewsController::class, 'update'])->name('admin.news.update');
        Route::delete('/admin-news/destroy/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

    });
});
