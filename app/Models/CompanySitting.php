<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySitting extends Model
{
    use HasFactory;
    protected $table = 'company_sittings';

    protected $fillable = [
        'name',
        'nameEn',
        'address',
        'phone',
        'fax',
        'web',
        'mail',
        'logo',
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
