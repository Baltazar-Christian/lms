<?php

namespace App\Models;

use App\Models\Instute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status', 'created_by'];


    public function institutes()
    {
        return $this->belongsToMany(Instute::class, 'institute_module')
            ->withPivot('status', 'created_by')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
