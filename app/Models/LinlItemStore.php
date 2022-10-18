<?php

namespace App\Models;

use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\StStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LinlItemStore extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'item_id',
        'unit_id',
        'amount',
    ];
    public function stores() {
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }
    public function items() {
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }

    public function units() {
        return $this->belongsTo(IteUnit::class , 'unit_id' , 'id');
    }
}
