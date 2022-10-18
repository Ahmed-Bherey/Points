<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerMaintenance extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'dev_name',
        'date',
        'status',
        'hanger_num',
        'mainten_status',
    ];

    public function clients(){
        return $this->belongsTo(Client::class , 'client_id' , 'id');
    }
}
