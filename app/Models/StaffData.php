<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffData extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'salary',
        'tel',
        'notes',
    ];
}
