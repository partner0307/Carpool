<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'carpool_notification';

    protected $fillable = ['title', 'message', 'type'];

    public $timestamps = false;
}
