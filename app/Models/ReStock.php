<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReStock extends Model
{
    use HasFactory;
    protected $fillable=[
        'supplier_id',
        'item_id',
        'restock_quantity',
    ];
}
