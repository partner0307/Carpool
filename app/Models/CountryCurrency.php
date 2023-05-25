<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryCurrency extends Model
{
    use HasFactory;

    protected $table = 'carpool_country_currency';

    protected $fillable = ['country', 'code', 'rate_to_usd', 'status'];

    public $timestamps = false;
}
