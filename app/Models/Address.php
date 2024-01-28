<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'sddress1',
        'sddress2',
        'distric',
        'province',
        'postal_code',
        'country',
        'city',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
