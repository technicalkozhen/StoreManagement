<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'state' ,
        'user_id'

    ];

    public function productinvoices()
    {
        return $this->hasMany(ProductInvoice::class, 'invoice_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    


}
