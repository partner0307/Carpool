<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;

    protected $table = 'carpool_promo_code';

    protected $fillable = ['promo_code', 'usage_limit_user', 'description', 'mix_order_amount', 'max_discount_amount', 'discount', 'usertype', 'discount_type', 'expire_date'];

    public $timestamps = false;
}
