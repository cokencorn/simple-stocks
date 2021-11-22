<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockTransaction;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function stocksView()
    {
        return view('stock-list', ['items' => Stock::all()]);
    }

    public function createStockView()
    {
        return view('stock');
    }

    public function createStockAction(Request $request)
    {
        Stock::create([
            'description' => $request->description,
            'code' => $request->code,
            'barcode' => $request->barcode
        ]);

        return $this->stocksView();
    }

    public function updateStock()
    {

    }

    public function deleteStockAction(Stock $stock)
    {
        $stock->delete();

        return $this->stocksView();
    }

    public function stockTransactionsView()
    {
        return view('stock-transaction-list', ['items' => StockTransaction::all()]);
    }

    public function createStockTransactionView(Request $request)
    {
        return view('stock-transaction');
    }

    public function createStockTransactionAction(Request $request)
    {
        $amount = $request->type == 'add' ? $request->amount : -$request->amount;

        StockTransaction::create([
            'stock_id' => $request->stock_id,
            'amount' => $amount,
            'date' => $request->date,
            'description' => $request->description
        ]);

        return $this->stockTransactionsView();
    }

    public function updateStockTransaction()
    {

    }

    public function deleteStockTransactionAction(StockTransaction $stockTransaction)
    {
        $stockTransaction->delete();

        return $this->stockTransactionsView();
    }

    public function stockReportByDateView(Request $request)
    {
        $stocks = [];
        foreach (Stock::all() as $stock) {
            $amount = StockTransaction::where('stock_id', $stock->id)
                ->whereBetween('date', [$request->start_date, $request->end_date])
                ->sum('amount');

            $stocks[$stock->id] = ['stock' => $stock, 'amount' => $amount];
        }

        return view('reports.stocks-by-date')
            ->with(['items' => $stocks]);
    }
}
