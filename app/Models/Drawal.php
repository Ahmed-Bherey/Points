<?php

namespace App\Models;

use App\Models\Industrial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Drawal extends Model
{
    use HasFactory;
    protected $fillable = [
        'drawal_id',
        'invoice_num',
        'withdrawal_value',
        'date',
        'invoice_date',
    ];

    public function industrials(){
        return $this->belongsTo(Industrial::class , 'drawal_id' , 'id');
    }
}
