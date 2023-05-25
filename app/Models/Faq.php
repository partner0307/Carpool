<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'carpool_faq';

    protected $fillable = ['title', 'message', 'date'];

    public $timestamps = false;
}
