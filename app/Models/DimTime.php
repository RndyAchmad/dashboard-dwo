<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimTime extends Model
{
    use HasFactory;
    protected $table = 'DimTime';
    protected $primaryKey = 'TimeKey';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'TimeKey',
        'FullDate',
        'Day',
        'Month',
        'MonthName',
        'Quarter',
        'Year'
    ];
}
