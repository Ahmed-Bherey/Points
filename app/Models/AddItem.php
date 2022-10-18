<?php

namespace App\Models;

use App\Models\IteItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AddItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'item_id',
        'quantity',
        'notes',
    ];

    public function items(){
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }
}
