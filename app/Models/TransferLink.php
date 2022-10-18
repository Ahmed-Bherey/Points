<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferLink extends Model
{
    use HasFactory;
    protected $fillable = ['store_id' , 'item_id' , 'quantity'];
}
