<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rewards extends Model
{
    use HasFactory;

    protected $table = 'carpool_rewards';

    protected $fillable = ['icon', 'title', 'description', 'points', 'amount', 'status'];

    public $timestamps = false;
}
