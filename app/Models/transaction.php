<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_number',
        'qty',
        'total_amount',
        'total_count',
        'product_detail',
        'invoice_date',
    ];
    public function customer(){
        return $this->belongsTo(customer::class);
    }
    public function product(){
        return $this->belongsTo(product::class);
    }


}
