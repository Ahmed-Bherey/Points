<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowPrice extends Model
{
    use HasFactory;
    protected $fillable = [
        'show_prices_num',
        'show_prices_type',
        'customer_id',
        'item_id',
        'unit_id',
        'code',
        'quantity',
        'notes',
        'unit_price',
        'dicount_value',
        'dicount_rate',
        'total_item_price',
        'total_items',
        'added_tax_value',
        'added_tax_rate',
        'profit',
    ];

    public function items(){
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }

    public function units(){
        return $this->belongsTo(IteUnit::class , 'unit_id' , 'id');
    }

    public function customers(){
        return $this->belongsTo(SalesReturn::class , 'customer_id' , 'id');
    }
}
