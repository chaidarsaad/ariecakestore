<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'resep';
    protected $fillable = [
        'resep',
        'netto',
        'prod_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
