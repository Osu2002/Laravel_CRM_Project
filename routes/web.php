<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProposalController;
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

Route::get('auth/dashboard', [DashboardController::class, 'dashboard']);
Route::get('auth/customer', [CustomerController::class, 'customer']);
Route::get('auth/proposal', [ProposalController::class, 'proposal']);
Route::get('auth/invoice', [InvoiceController::class, 'invoice']);
Route::get('auth/customerindex', [CustomerController::class, 'customerindex'])->name('auth.customerindex');



Route::get('/auth/customerindex', function () {
    return view('auth.customerindex');
});

Route::get('/auth/proposalindex', function () {
    return view('auth.proposalindex');
});

Route::get('/auth/invoiceindex', function () {
    return view('auth.invoiceindex');
});

Route::post('auth/customerstore', [CustomerController::class, 'store'])->name('customer.customerstore');
Route::post('auth/proposalstore', [ProposalController::class, 'store'])->name('proposal.proposalstore');
Route::post('auth/invoicestore', [InvoiceController::class, 'store'])->name('invoice.invoicestore');




Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
