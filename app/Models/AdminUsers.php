<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUsers extends Model
{
    use HasFactory;

    protected $table = 'carpool_admin_users';

    protected $fillable = ['firstname', 'lastname', 'email', 'password', 'company_id', 'role_id'];

    public $timestamps = false;

    public function getCompany() {
        return $this->belongsTo(BusinessList::class, 'company_id');
    }
}
