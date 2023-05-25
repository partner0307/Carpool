<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSupport extends Model
{
    use HasFactory;

    protected $table = 'carpool_bank_support';

    protected $fillable = ['name', 'country'];

    public $timestamps = false;
}
