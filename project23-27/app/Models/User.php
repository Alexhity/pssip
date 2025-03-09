<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Order;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Отношение с курсами (студент)
    public function courses() {
        return $this->belongsToMany(Course::class, 'courses_user');
    }

    // Отношение с языками (изучаемые/преподаваемые)
    public function languages() {
        return $this->belongsToMany(Language::class, 'languages_user')->withPivot('type');
    }

    // Отношение с отзывами
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    // Курсы, которые ведет преподаватель
    public function taughtCourses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
