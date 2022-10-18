<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DuesToClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'amount',
        'date',
        'notes',
    ];

    public function clients(){
        return $this->belongsTo(Client::class , 'client_id' , 'id');
    }
}
