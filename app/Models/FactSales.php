<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactSales extends Model
{
    use HasFactory;
    protected $table = 'FactSales';
    protected $primaryKey = 'SalesKey';
    public $timestamps = false;

    protected $fillable = [
        'TimeKey',
        'ProductKey',
        'TerritoryKey',
        'CustomerKey',
        'ShipMethodKey',
        'OrderQty',
        'UnitPrice',
        'LineTotal'
    ];

    public function time()
    {
        return $this->belongsTo(DimTime::class, 'TimeKey');
    }

    public function product()
    {
        return $this->belongsTo(DimProduct::class, 'ProductKey');
    }
}
