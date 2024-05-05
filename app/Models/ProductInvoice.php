<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInvoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'product_id',
        'name',
        'code',
        'price',
        'quantity',
        'image',
    ];
}
