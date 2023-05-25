<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $table = 'carpool_reviews';

    public $timestamps = false;


    public function getSender () {
        return $this->belongsTo(Users::class, 'from_user_id');
    }

    public function getReceiver () {
        return $this->belongsTo(Users::class, 'to_user_id');
    }

    public function getRides () {
        return $this->belongsTo(Rides::class, 'rides');
    }
}
