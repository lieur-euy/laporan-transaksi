<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'prdnm',
        'harga'
    ];
    public function transaction()
    {
        return $this->hasMany(transaction::class);
    }
}
