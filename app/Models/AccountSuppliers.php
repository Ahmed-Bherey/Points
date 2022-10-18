<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Supplier;
use App\Models\Treasury;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AccountSuppliers extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'receipt_num',
        'payment_getway',
        'date',
        'treasury_id',
        'bank_id',
        'amount',
        'note',
    ];

    public function suppliers(){
        return $this->belongsTo(Supplier::class , 'supplier_id' , 'id');
    }

    public function treasuries(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }
}
