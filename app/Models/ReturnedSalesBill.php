<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnedSalesBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_id',
        'item_id',
        'quantity',
        'unit_price',
        'sale_price',
        'unit_id',
        'discount_value2',
        'discount_rate2',
        'total_price',
    ];

    public function items(){
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }

    public function units(){
        return $this->belongsTo(IteUnit::class , 'unit_id' , 'id');
    }
}
