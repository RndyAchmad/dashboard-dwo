<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimShipMethod extends Model
{
  use HasFactory;
  protected $table = 'DimShipMethod';
  protected $primaryKey = 'ShipMethodKey';
  public $timestamps = false;

  protected $fillable = [
    'ShipMethodID',
    'ShipMethodName',
    'ShipBase',
    'ShipRate'
  ];
}
