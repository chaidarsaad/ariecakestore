<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'resep';
    protected $fillable = [
        'stokbahan_id',
        'netto',
        'products',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'products','id');
    }

    public function stokbahan()
    {
        return $this->belongsTo(Stokbahan::class,'stokbahan_id','id');
    }
}
