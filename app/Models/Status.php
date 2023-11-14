<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, SoftDeletes;

    const LIVE = 1;
	const DRAFT = 2;

    protected $table = 'status';

    protected $fillable = [
        'name',
    ];
}
