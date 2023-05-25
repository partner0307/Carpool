<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessList extends Model
{
    use HasFactory;

    protected $table = 'carpool_business_list';

    protected $fillable = ['name', 'email', 'logo', 'address'];

    public $timestamps = false;
}
