<?php

namespace App\Models;

use App\Models\IteItem;
use App\Models\IteUnit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategComponent extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_id',
        'pay_cost',
        'unit_id',
        'quantity',
        'combaibed_product_cost',
    ];

    public function items(){
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }

    public function unites(){
        return $this->belongsTo(IteUnit::class , 'unit_id' , 'id');
    }
}
