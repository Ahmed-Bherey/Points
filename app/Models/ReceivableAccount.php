<?php

namespace App\Models;

use App\Models\ReceivablesData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReceivableAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'receivable_id',
        'process',
        'amount',
        'balance',
        'date',
        'notes',
    ];

    public function receivables(){
        return $this->belongsTo(ReceivablesData::class , 'receivable_id' , 'id');
    }
}
