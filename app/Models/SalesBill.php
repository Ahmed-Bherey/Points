<?php

namespace App\Models;

use App\Models\IteItem;
use App\Models\IteUnit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalesBill extends Model
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
