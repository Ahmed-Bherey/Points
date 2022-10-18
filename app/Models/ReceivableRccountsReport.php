<?php

namespace App\Models;

use App\Models\ReceivablesData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReceivableRccountsReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'receivable_id',
        'dateFrom',
        'dateTo',
    ];

    public function Receivables() {
        return $this->belongsTo(ReceivablesData::class , 'receivable_id' , 'id');
    }
}
