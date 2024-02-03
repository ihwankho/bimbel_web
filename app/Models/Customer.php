<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['nama', 'email', 'nomor_telepon','password', 'alamat', 'tanggal_lahir', 'paket', 'harga'];
}
