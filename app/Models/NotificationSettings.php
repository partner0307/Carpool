<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationSettings extends Model
{
    use HasFactory;

    protected $table = 'carpool_notification_settings';

    protected $fillable = ['provider', 'status'];

    public $timestamps = false;
}
