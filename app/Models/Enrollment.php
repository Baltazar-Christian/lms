<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    use HasFactory;


    protected $fillable = ['student_id', 'course_id', 'approval_status'];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_id');
    }


    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
