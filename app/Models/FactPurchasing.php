<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactPurchasing extends Model
{
    use HasFactory;

    protected $table = 'factpurchasing';
    protected $primaryKey = 'PurchasingKey';
    public $timestamps = false;

    protected $fillable = [
        'TimeKey',
        'ProductKey',
        'VendorKey',
        'ShipMethodKey',
        'OrderQty',
        'UnitPrice',
        'LineTotal'
    ];

    // === DIMENSIONS ===

    public function time()
    {
        return $this->belongsTo(DimTime::class, 'TimeKey', 'TimeKey');
    }

    public function vendor()
    {
        return $this->belongsTo(DimVendor::class, 'VendorKey', 'VendorKey');
    }

    public function product()
    {
        return $this->belongsTo(DimProduct::class, 'ProductKey', 'ProductKey');
    }
}
