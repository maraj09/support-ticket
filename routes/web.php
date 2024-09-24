<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::prefix('/customer')->middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('customer.tickets.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('customer.tickets.store');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::patch('/admin/tickets/{ticket}/close', [TicketController::class, 'close'])->name('tickets.close');
});


Route::middleware('auth')->group(function () {
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::post('/tickets/{ticket}/reply', [TicketController::class, 'reply'])->name('tickets.reply');
});
