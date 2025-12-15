<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimSalesTerritory extends Model
{
    use HasFactory;
    protected $table = 'DimSalesTerritory';
    protected $primaryKey = 'TerritoryKey';
    public $timestamps = false;

    protected $fillable = [
        'TerritoryID',
        'TerritoryName',
        'CountryRegionCode',
        'TerritoryGroup'
    ];
}
