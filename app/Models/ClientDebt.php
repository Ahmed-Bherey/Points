<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientDebt extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'date',
        'type',
        'amount',
    ];

    public function clients(){
        return $this->belongsTo(Client::class , 'client_id' , 'id');
    }
}
