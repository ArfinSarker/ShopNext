<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;
        if ($role === 'admin') {
            return redirect('/admin/dashboard');
        } elseif ($role === 'seller') {
            return redirect('/seller/dashboard');
        }

        return redirect('/');
    })->name('dashboard');

    Route::get('/admin/dashboard', function () {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized. Admin access required.');
        }

        $users = User::latest()->take(25)->get();
        $buyerCount = User::where('role', 'customer')->count();
        $sellerCount = User::where('role', 'seller')->count();
        $adminCount = User::where('role', 'admin')->count();

        return view('admin.dashboard', compact('users', 'buyerCount', 'sellerCount', 'adminCount'));
    })->name('admin.dashboard');

    Route::get('/seller/dashboard', function () {
        if (auth()->user()->role !== 'seller' && auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized. Seller access required.');
        }

        return view('seller.dashboard');
    })->name('seller.dashboard');
});
