<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankProces extends Model
{
    use HasFactory;
    protected $fillable = [
        'bank_id',
        'supplier_id',
        'type',
        'creditor',
        'debtor',
        'notes',
    ];

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }

    public function suppliers(){
        return $this->belongsTo(Supplier::class , 'supplier_id' , 'id');
    }
}
