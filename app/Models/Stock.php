<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['code', 'barcode', 'description'];

    public function getCurrentStock(): float
    {
        return StockTransaction::where('stock_id', $this->id)->sum('amount');
    }

    public function hasTransactions(): bool
    {
        return StockTransaction::where('stock_id', $this->id)->exists();
    }
}
