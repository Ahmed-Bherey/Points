<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'name',
        'active',
    ];
}
