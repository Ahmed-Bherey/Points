<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Client;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Check extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'bank_id',
        'client_id',
        'supplier_id',
        'amount',
        'notes',
        'date',
        'check_num',
        'to',
    ];

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }

    public function clients(){
        return $this->belongsTo(Client::class , 'client_id' , 'id');
    }

    public function suppliers(){
        return $this->belongsTo(Supplier::class , 'supplier_id' , 'id');
    }
}
