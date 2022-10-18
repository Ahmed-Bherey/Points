<?php

namespace App\Models;

use App\Models\Type;
use App\Models\IteUnit;
use App\Models\StStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_id',
        'date',
        'storeFrom_id',
        'storeTo_id',
        'item_id',
        'unit_id',
        'quantity',
        'note',
    ];

    public function storeFrom(){
        return $this->belongsTo(StStore::class , 'storeFrom_id' , 'id');
    }

    public function storeTo(){
        return $this->belongsTo(StStore::class , 'storeTo_id' , 'id');
    }

    public function items(){
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }

    public function unites(){
        return $this->belongsTo(IteUnit::class , 'unit_id' , 'id');
    }
}
