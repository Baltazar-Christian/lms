<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'description',
        'contact_address',
        'contact_phone',
        'contact_email',
        'website',
    ];
}
