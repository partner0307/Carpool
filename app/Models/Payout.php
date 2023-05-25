<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    use HasFactory;

    protected $table = 'carpool_payout';

    protected $fillable = ['amount', 'charge', 'bank', 'status'];

    public $timestamps = false;



    public function getUser () {
        return $this->belongsTo(Users::class, 'user');
    }

    public function getBank () {
        return $this->belongsTo(BankSupport::class, 'bank');
    }
}
