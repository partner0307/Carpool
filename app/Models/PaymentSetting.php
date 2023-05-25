<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    use HasFactory;

    protected $table = 'carpool_payment_setting';

    protected $fillable = ['name', 'icon', 'type', 'status'];

    public $timestamps = false;
}
