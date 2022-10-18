<?php

namespace App\Models;

use App\Models\Representative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tel',
        'company_name',
        'phone',
        'fax',
        'email',
        'id_num',
        'governorate',
        'city',
        'town',
        'note',
        'address',
        'representative_id',
        'credit',
        'day',
        'tax_file',
        'tax_num',
        'commerc_num',
        'dept',
        'logo',
        'balance',
    ];

    public function representatives(){
        return $this->belongsTo(Representative::class , 'representative_id' , 'id');
    }
}
