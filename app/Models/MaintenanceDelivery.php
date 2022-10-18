<?php

namespace App\Models;

use App\Models\Engineer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaintenanceDelivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'engineer_id',
        'result',
        'date',
        'notes',
        'maintenance_cost',
        'price',
        'total',
        'pre_paid',
        'net',
        'paid',
    ];

    public function engineers(){
        return $this->belongsTo(Engineer::class , 'engineer_id' , 'id');
    }
}
