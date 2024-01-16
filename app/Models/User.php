<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Course;
use App\Models\CourseContent;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable implements CanResetPasswordContract
{
    use HasApiTokens, HasFactory, Notifiable,CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone_number',
        'address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    const ROLE_ADMIN = 'admin';
    const ROLE_SUPPORT = 'support';
    const ROLE_TUTOR = 'tutor';
    const ROLE_STUDENT = 'student';

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isSupport()
    {
        return $this->role === self::ROLE_SUPPORT;
    }

    public function isTutor()
    {
        return $this->role === self::ROLE_TUTOR;
    }

    public function isStudent()
    {
        return $this->role === self::ROLE_STUDENT;
    }



    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }


    public function completedContents() {
        return $this->belongsToMany(CourseContent::class, 'user_course_content')
            ->withPivot('is_completed')
            ->withTimestamps();
    }

    public function enrolledCourses() {
        return $this->belongsToMany(Course::class, 'enrollments')->withPivot('is_completed');
    }

    public function quizResults(){
        return $this->belongsTo(QuizResult::class, 'user_id','id');

    }

    public function seenNotifications()
    {
        return $this->belongsToMany(Notifiícation::class, 'notification_user')->withPivot('seen')->withTimestamps();
    }
}
