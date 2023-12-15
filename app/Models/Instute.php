<?php

namespace App\Models;

use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instute extends Model
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
            'code',
            'status',
    ];

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'institute_module')
            ->withPivot('status', 'created_by')
            ->withTimestamps();
    }
}
