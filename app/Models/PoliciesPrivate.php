<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliciesPrivate extends Model
{
    use HasFactory;

    protected $table = 'carpool_policies_private';

    protected $fillable = ['title', 'content'];

    public $timestamps = false;
}
