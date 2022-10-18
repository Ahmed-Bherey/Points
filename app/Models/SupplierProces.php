<?php

namespace App\Models;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplierProces extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'creditor',
        'debtor',
        'notes',
    ];

    public function suppliers(){
        return $this->belongsTo(Supplier::class , 'supplier_id' , 'id');
    }
}
