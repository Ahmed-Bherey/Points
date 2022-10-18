<?php

namespace App\Models;

use App\Models\StStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'material_num',
        'date',
        'quantity',
        'material_type',
    ];

    public function stStores() {
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }
}
