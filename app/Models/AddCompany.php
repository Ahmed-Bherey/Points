<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'website',
        'fax',
        'en_name',
        'phone',
        'email',
    ];
}
