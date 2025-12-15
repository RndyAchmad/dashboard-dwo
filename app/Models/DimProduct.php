<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimProduct extends Model
{
    use HasFactory;
    protected $table = 'DimProduct';
    protected $primaryKey = 'ProductKey';
    public $timestamps = false;

    protected $fillable = [
        'ProductID',
        'ProductName',
        'ProductNumber',
        'Category',
        'Subcategory',
        'StandardCost',
        'ListPrice'
    ];
}
