<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/stocks', [App\Http\Controllers\StockController::class, 'stocksView'])->name('stock.list');
Route::get('/stock', [App\Http\Controllers\StockController::class, 'createStockView'])->name('stock');
Route::post('/stock', [App\Http\Controllers\StockController::class, 'createStockAction'])->name('stock.create');
Route::get('/stock/{stock}/delete', [App\Http\Controllers\StockController::class, 'deleteStockAction'])->name('stock.delete');


Route::get('/stock/transactions', [App\Http\Controllers\StockController::class, 'stockTransactionsView'])->name('stock.transaction.list');
Route::get('/stock/transaction', [App\Http\Controllers\StockController::class, 'createStockTransactionView'])->name('stock.transaction');
Route::post('/stock/transaction', [App\Http\Controllers\StockController::class, 'createStockTransactionAction'])->name('stock.transaction.create');
Route::get('/stock/transaction/{stockTransaction}/delete', [App\Http\Controllers\StockController::class, 'deleteStockTransactionAction'])->name('stock.transaction.delete');

Route::get('/stock/report', [App\Http\Controllers\StockController::class, 'stockReportByDateView'])->name('stock.report');

