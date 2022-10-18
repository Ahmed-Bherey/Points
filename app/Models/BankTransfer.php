<?php

namespace App\Models;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankTransfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'bankFrom_id',
        'bankTo_id',
        'value',
        'notes',
    ];

    public function banksFrom(){
        return $this->belongsTo(Bank::class , 'bankFrom_id' , 'id');
    }

    public function banksTo(){
        return $this->belongsTo(Bank::class , 'bankTo_id' , 'id');
    }
}
