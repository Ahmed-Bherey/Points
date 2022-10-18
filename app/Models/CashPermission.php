<?php

namespace App\Models;

use App\Models\IteItem;
use App\Models\StStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CashPermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_id',
        'items_id',
        'quantity',
        'price',
    ];

    public function items(){
        return $this->belongsTo(IteItem::class , 'items_id' , 'id');
    }
}
