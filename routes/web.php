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




Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('auth/customer/customer', [CustomerController::class, 'customer']);
Route::get('auth/Proposal/proposal', [ProposalController::class, 'proposal']);
Route::get('auth/Invoice/invoice', [InvoiceController::class, 'invoice']);
Route::get('auth/customer/customerindex', [CustomerController::class, 'customerindex'])->name('auth.customer.customerindex');



Route::get('/auth/customer/customerindex', function () {
    return view('auth.customer.customerindex');
});

Route::get('/auth/Proposal/proposalindex', function () {
    return view('auth.Proposal.proposalindex');
});

Route::get('/auth/Invoice/invoiceindex', function () {
    return view('auth.Invoice.invoiceindex');
});

Route::get('/auth/Invoice/invoiceindex', [InvoiceController::class, 'invoiceindex'])->name('invoice.index');
Route::get('/auth/customer/customerindex', [CustomerController::class, 'customerindex'])->name('customer.index');
Route::get('/auth/Proposal/proposalindex', [ProposalController::class, 'proposalindex'])->name('proposal.index');



Route::get('/auth/customer/{customer_id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::get('/auth/customer/delete/{customer_id}', [CustomerController::class, 'delete'])->name('customer.delete');
Route::put('/auth/customer/{customer_id}', [CustomerController::class, 'update'])->name('customer.update');

Route::get('/auth/Proposal/{proposal_id}', [ProposalController::class, 'edit'])->name('Proposal.edit');
Route::put('/auth/Proposal/{proposal_id}', [ProposalController::class, 'update'])->name('Proposal.update');
Route::get('/auth/Proposal/delete/{proposal_id}', [ProposalController::class, 'delete'])->name('Proposal.delete');

Route::get('/auth/Invoice/{invoice_id}', [InvoiceController::class, 'edit'])->name('Invoice.edit');
Route::put('/auth/Invoice/{invoice_id}', [InvoiceController::class, 'update'])->name('Invoice.update');
Route::get('/auth/Invoice/delete/{invoice_id}', [InvoiceController::class, 'delete'])->name('Invoice.delete');



Route::post('auth/customerstore', [CustomerController::class, 'store'])->name('customer.customerstore');
Route::post('auth/proposalstore', [ProposalController::class, 'store'])->name('proposal.proposalstore');
Route::post('auth/invoicestore', [InvoiceController::class, 'store'])->name('invoice.invoicestore');




Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
