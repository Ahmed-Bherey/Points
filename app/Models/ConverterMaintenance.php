<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Technician;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConverterMaintenance extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'technician_id',
        'device_name',
    ];

    public function clients(){
        return $this->belongsTo(Client::class , 'client_id' , 'id');
    }

    public function technicians(){
        return $this->belongsTo(Technician::class , 'technician_id' , 'id');
    }
}
