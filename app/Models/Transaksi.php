<?php

// app/Models/Transaksi.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'no_invoice',
        'tanggal_bayar',
        'bukti_bayar',
        'total_bayar',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
