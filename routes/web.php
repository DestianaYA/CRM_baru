<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\KontentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\BroadcastController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;

// Landing Page
Route::get('/', [HomeController::class, 'index'])->name('landingpage')->middleware('guest');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Home Route (redirect based on user role)
Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');
Route::get('/reset', [HomeController::class, 'reset'])->name('reset');

// Dashboard Routes (grouped by role)
Route::middleware(['web', 'auth'])->group(function () {
    Route::prefix('superadmin')->middleware('check.role:superadmin')->group(function () {
        Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('superadmin.dashboard');
        Route::get('/pengguna', [PenggunaController::class, 'pengguna'])->name('superadmin.pengguna');
        Route::get('/pendapatan', [PendapatanController::class, 'pendapatan'])->name('superadmin.pendapatan');
    });
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::prefix('admin')->middleware('check.role:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');  
        //form komisi
        Route::get('/komisi/harga/create', [HargaController::class, 'edit'])->name('komisi.harga.create');
        Route::patch('/komisi/harga/', [HargaController::class, 'store'])->name('komisi.harga.update');
        //kategori
        Route::prefix('admin/komisi/kategori')->name('admin.komisi.kategori.')->group(function() {
            Route::get('/index', [KategoriController::class, 'index'])->name('index');
            Route::get('/create', [KategoriController::class, 'create'])->name('create');
            Route::post('/', [KategoriController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [KategoriController::class, 'edit'])->name('edit');
            Route::put('/update/{kategori}', [KategoriController::class, 'update'])->name('update');
            Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('destroy');
        });
        //Data User
        Route::get('/DataUser', [DataUserController::class, 'create'])->name('DataUser');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        //kontent
        Route::get('/kontent', [KontentController::class, 'edit'])->name('kontent');
        Route::patch('/kontent', [KontentController::class, 'store'])->name('kontent.update');
        //tabel user
        Route::get('/dashboard', [UserController::class, 'index'])->name('admin.dashboard');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/admin/edit/{id}', [UserController::class, 'edit'])->name('admin.edit');
        Route::delete('/admin/{user}', [UserController::class, 'destroy'])->name('admin.destroy');
        Route::put('/user/update/{id}', [AdminController::class, 'update'])->name('admin.user.update'); // Updated name
        Route::get('/user/{id}', [UserController::class, 'tampil'])->name('user.profile');
        Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    });
    Route::prefix('agent')->middleware('check.role:agent')->group(function () {
        Route::get('/dashboard', [AgentController::class, 'showBalance'])->name('agent.dashboard');
        Route::get('/form', [AgentController::class, 'form'])->name('agent.form.create');
        Route::get('/pesan', [AgentController::class, 'pesan'])->name('agent.pesan');
        Route::get('/order', [AgentController::class, 'order'])->name('agent.orders');
        Route::get('/mitra/index', [AgentController::class, 'index'])->name('mitra.index');
        Route::get('/agent.transaksi', [AgentController::class, 'transaksi'])->name('agent.transaksi');
        Route::get('/topup', [AgentController::class, 'topups'])->name('agent.topup');
        //mitra
        Route::prefix('agent/mitra')->name('agent.mitra.')->group(function() {
            Route::get('/index', [AgentController::class, 'index'])->name('index');
            Route::get('/create', [MitraController::class, 'create'])->name('create');
            Route::post('/agents', [MitraController::class, 'store'])->name('agents.store');
            Route::get('/agents/edit/{id}', [MitraController::class, 'edit'])->name('agents.edit');
            Route::put('/user/{id}', [MitraController::class, 'update'])->name('user.update');
            Route::get('/order', [MitraController::class, 'order'])->name('order');
        });
        Route::middleware(['auth', 'role:agent'])->group(function () {
            Route::get('/broadcast/realtime', [BroadcastController::class, 'realtime'])->name('agent.broadcast.realtime');
            Route::get('/broadcast/terjadwal', [BroadcastController::class, 'terjadwal'])->name('agent.broadcast.terjadwal');
        });
        //Route::get('/agent/realtime', [BroadcastController::class, 'realtime'])->name('agent.realtime');
        //Route::get('/agent/terjadwal', [BroadcastController::class, 'terjadwal'])->name('agent.terjadwal');
    });
    Route::prefix('client')->middleware('check.role:client')->group(function () {
        //payment
        Route::post('/topup', [TopUpController::class, 'createTransaction'])->middleware('auth');
        Route::post('/midtrans/notification', [TopUpController::class, 'handleNotification']);
        //terkirim
        Route::get('/pesan', [ClientController::class, 'pesan'])->name('pesan');
        Route::get('/pesan', [PesanController::class, 'tampilan'])->name('pesan');
        //transaksi
        Route::get('/client.transaksi', [ClientController::class, 'transaksi'])->name('client.transaksi');
        Route::get('/topup', [ClientController::class, 'topup'])->name('client.topup');
        //broadcast
        Route::middleware(['auth', 'role:client'])->group(function () {
            Route::get('/broadcast/realtime', [BroadcastController::class, 'realtime'])->name('client.broadcast.realtime');
            Route::get('/broadcast/terjadwal', [BroadcastController::class, 'terjadwal'])->name('client.broadcast.terjadwal');
        });
        //message
        Route::middleware(['auth', 'role:agent,client'])->group(function () {
            Route::get('/form/create', [MessageController::class, 'create'])->name('form.create');
            Route::post('/messages', [MessageController::class, 'store'])->name('form.store');
        });
        Route::get('/messages/{user_id}', [MessageController::class, 'getMessages'])->name('messages.get');
        //form broadcast
        //Route::get('client.broadcast.realtime', [BroadcastController::class, 'realtime'])->name('client.broadcast.realtime');
        //Route::get('client.broadcast.terjadwal', [BroadcastController::class, 'terjadwal'])->name('client.broadcast.terjadwal');
        //form Topup
        Route::post('/topups/store', [TopUpController::class, 'store'])->name('topups.store');
        //qr
        Route::get('/whatsapp-qr', [ClientController::class, 'whatsapp'])->name('whatsapp-qr');
        //transaksi
        Route::get('/transaksi', [OrdersController::class, 'toBalance'])->name('transaksi');
        Route::get('/transaksi', [OrdersController::class, 'create'])->name('transaksi');
        //dashboard
        Route::get('/dashboard', [DashboardController::class, 'awal'])->name('client.dashboard');
        Route::get('/dashbaord', [ClientController::class, 'back'])->name('dashboard.back');
        Route::get('/dashbaord', [ClientController::class, 'clientBalance'])->name('dashboard.clientBalance');
        Route::get('/dashbaord', [ClientController::class, 'client'])->name('dashboard.client');
    });
});