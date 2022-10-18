<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FilterData extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'status',
        'device_name',
    ];

    public function clients(){
        return $this->belongsTo(Client::class , 'client_id' , 'id');
    }
}
