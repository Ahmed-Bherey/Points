<?php

namespace App\Models;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;
    protected $fillable = ['bank_id' , 'amount' , 'date'];

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }
}
