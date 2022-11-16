<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MySale extends Model
{
    use HasFactory;

    protected $fillable=[
        'sales_code',
        'total_price',
        'buyer_name',
        'sold_date'
    ];
}
