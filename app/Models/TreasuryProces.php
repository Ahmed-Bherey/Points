<?php

namespace App\Models;

use App\Models\Supplier;
use App\Models\Treasury;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TreasuryProces extends Model
{
    use HasFactory;
    protected $fillable = [
        'treasury_id',
        'supplier_id',
        'type',
        'creditor',
        'debtor',
        'notes',
    ];

    public function treasuries(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }

    public function suppliers(){
        return $this->belongsTo(Supplier::class , 'supplier_id' , 'id');
    }
}
