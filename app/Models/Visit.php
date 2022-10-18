<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Representative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visit extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'client_id',
        'data',
        'representative_id',
        'description',
    ];

    public function clients(){
        return $this->belongsTo(Client::class ,'client_id','id');
    }
    public function representatives(){
        return $this->belongsTo(Representative::class ,'representative_id','id');
    }
}
