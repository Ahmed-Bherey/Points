<?php

namespace App\Models;

use App\Models\AddCompany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    protected $table = 'types';
    protected $fillable = [
        'name',
        'ite_company_id',
    ];

    public function companies(){
        return $this->belongsTo(AddCompany::class , 'ite_company_id' , 'id');
    }
}
