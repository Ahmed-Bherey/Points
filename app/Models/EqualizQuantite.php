<?php

namespace App\Models;

use App\Models\IteItem;
use App\Models\StStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EqualizQuantite extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'total_id',
        'items_id',
        'quantity',
        'price',
        'note',
    ];

    public function stores(){
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }

    public function items(){
        return $this->belongsTo(IteItem::class , 'items_id' , 'id');
    }
}
