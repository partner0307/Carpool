<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequiredDocument extends Model
{
    use HasFactory;

    protected $table = 'carpool_required_document';

    protected $fillable = ['name', 'type'];

    public $timestamps = false;
}
