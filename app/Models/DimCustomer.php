<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimCustomer extends Model
{
    use HasFactory;
    protected $table = 'DimCustomer';
    protected $primaryKey = 'CustomerKey';
    public $timestamps = false;

    protected $fillable = [
        'CustomerID',
        'CustomerType',
        'PersonName',
        'StoreName',
        'TerritoryID'
    ];
}
