<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rides extends Model
{
    use HasFactory;

    protected $table = 'carpool_rides';

    protected $fillable = ['date_issue', 'payment', 'pickup', 'arrival', 'trip_type', 'seats', 'amount', 'status'];

    public $timestamps = false;

    public function getUser () {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
