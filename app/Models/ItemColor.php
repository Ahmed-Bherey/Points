<?php

namespace App\Models;

use App\Models\Type;
use App\Models\IteSize;
use App\Models\StStore;
use App\Models\IteColor;
use App\Models\AddCompany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IteItem extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'company_id',
        'type_id',
        'unit_id',
        'color_id',
        'size_id',
        'store_id',
        'notes',
        'points',
        'profit',
        'pur_price',
        'max_discount',
        'max_sell',
        'min_qty',
        'max_qty',
    ];


    public function companies() {
        return $this->belongsTo(AddCompany::class , 'company_id' , 'id');
    }

    public function types() {
        return $this->belongsTo(Type::class , 'type_id' , 'id');
    }

    public function sizes() {
        return $this->belongsTo(IteSize::class , 'size_id' , 'id');
    }

    public function colors() {
        return $this->belongsTo(IteColor::class , 'color_id' , 'id');
    }

    public function stStores() {
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }
}
