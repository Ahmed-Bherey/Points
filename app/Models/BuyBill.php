<?php

namespace App\Models;

use App\Models\IteItem;
use App\Models\IteUnit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BuyBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_id',
        'item_id',
        'quantity',
        'unit_price',
        'purchasing_price',
        'sell_price',
        'unit_id',
        'discount_value',
        'discount_rate',
        'total_price',
    ];

    public function items(){
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }

    public function units(){
        return $this->belongsTo(IteUnit::class , 'unit_id' , 'id');
    }
}
