<?php

namespace App\Models;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserBank extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'bank_id'];

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }
}
