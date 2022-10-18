<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReminderDue extends Model
{
    use HasFactory;
    protected $fillable = [
        'date1',
        'amount',
        'date2',
        'notes',
    ];
}
