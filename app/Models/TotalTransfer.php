<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalTransfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'storeFrom_id',
        'storeTo_id',
    ];

    public function storeFrom(){
        return $this->belongsTo(StStore::class , 'storeFrom_id' , 'id');
    }

    public function storeTo(){
        return $this->belongsTo(StStore::class , 'storeTo_id' , 'id');
    }
}
