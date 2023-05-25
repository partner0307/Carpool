<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'carpool_users';

    protected $fillable = ['firstname', 'lastname', 'gender', 'email', 'password', 'phonenumber', 'photo', 'id_card', 'license', 'wallet', 'role', 'status'];

    public $timestamps = false;

    public function getCompany () {
        return $this->belongsTo(BusinessList::class, 'company');
    }
}
