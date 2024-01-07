<?php

namespace App\Models;

use App\Models\User;
use App\Models\Module;
use App\Models\CourseContent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'title',
        'description',
        'slug',
        'price',
        'duration_in_minutes',
        'is_published',
        'published_at',
        'cover_image',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function contents()
    {
        return $this->hasMany(CourseContent::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments')
        ->withPivot(['approval_status'])
        ->withTimestamps();

    }


    public function enrolledUsers() {
        return $this->belongsToMany(User::class, 'enrollments')->withPivot('is_completed');
    }
}
