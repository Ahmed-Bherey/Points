<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptFrom extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'result',
        'date',
        'tip',
        'cost',
        'notes',
    ];
}
