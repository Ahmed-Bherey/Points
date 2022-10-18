<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivablesData extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'tel',
        'balance',
        'notes',
    ];
}
