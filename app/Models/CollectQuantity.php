<?php

namespace App\Models;

use App\Models\StStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CollectQuantity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'max_qty',
        'quantity',
        'actual_qty',
        'storeFrom_id',
        'storeTo_id',
        'turn_num',
        'date',
    ];

    public function storeFrom(){
        return $this->belongsTo(StStore::class , 'storeFrom_id' , 'id');
    }

    public function storeTo(){
        return $this->belongsTo(StStore::class , 'storeTo_id' , 'id');
    }
}
