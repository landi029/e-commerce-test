<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatus extends Model
{
    use HasFactory, SoftDeletes;
    
    const CART = 1;
	const COMPLETED = 2;

    protected $table = 'order_status';

    protected $fillable = [
        'name',
    ];
}
