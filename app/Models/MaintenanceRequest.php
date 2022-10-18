<?php

namespace App\Models;

use App\Models\Client;
use App\Models\IteItem;
use App\Models\StStore;
use App\Models\Engineer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaintenanceRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_id',
        'receipt_num',
        'client_id',
        'client_tel',
        'address',
        'store_id',
        'date_from',
        'date_to',
        'engineer_id',
        'brand',
        'model',
        'rapair_place',
        'serial',
        'capacity',
        'problem',
        'max_cost',
        'notes',
    ];

    public function items() {
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }

    public function clients() {
        return $this->belongsTo(Client::class , 'client_id' , 'id');
    }

    public function stores() {
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }

    public function engineers() {
        return $this->belongsTo(Engineer::class , 'engineer_id' , 'id');
    }
}
