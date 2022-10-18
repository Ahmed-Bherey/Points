<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaintenanceWorthy extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'city',
        'date_from',
        'device_name',
        'covernorate',
        'date_to',
    ];

    public function clients(){
        return $this->belongsTo(Client::class , 'client_id' , 'id');
    }
}
