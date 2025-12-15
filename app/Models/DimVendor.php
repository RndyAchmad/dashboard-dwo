<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimVendor extends Model
{
    use HasFactory;
    protected $table = 'DimVendor';
    protected $primaryKey = 'VendorKey';
    public $timestamps = false;

    protected $fillable = [
        'VendorID',
        'VendorName',
        'CreditRating',
        'PreferredStatus'
    ];

    protected $casts = [
        'PreferredStatus' => 'boolean'
    ];
}
