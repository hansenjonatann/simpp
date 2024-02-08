<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockOut extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity_out',
        'stock_out_date'
    ];

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
