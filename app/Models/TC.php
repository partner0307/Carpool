<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TC extends Model
{
    use HasFactory;

    protected $table = 'carpool_tc';

    protected $fillable = ['title', 'content'];

    public $timestamps = false;
}
