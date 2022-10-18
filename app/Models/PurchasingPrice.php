<?php

namespace App\Models;

use App\Models\IteItem;
use App\Models\StStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchasingPrice extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'purchasing_price',
        'sale_price',
        'quantity',
        'item_id',
        'store_id',
    ];

    public function items(){
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }

    public function stores(){
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }
}
