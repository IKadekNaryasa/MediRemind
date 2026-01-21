<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'namaPasien',
        'jenisKelamin',
        'tanggalLahir',
        'alamat',
        'wa',
        'jam',
        'status'
    ];

    protected $casts = [
        'tanggalLahir' => 'date'
    ];
}
