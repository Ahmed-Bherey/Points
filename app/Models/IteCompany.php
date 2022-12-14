<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IteCompany extends Model
{
    use HasFactory;
    protected $table = 'ite_companies';

    protected $fillable = [
        'code', 'name'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at' ,'updated_at'
    ];

}

