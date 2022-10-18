<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Covenant extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'date' , 'type' , 'amount'];
}
