<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['stock_id', 'amount', 'date', 'description'];

    public function getStock(): Stock
    {
        return Stock::find($this->stock_id);
    }
}
