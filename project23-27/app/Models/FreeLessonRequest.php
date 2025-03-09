<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreeLessonRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'language_id', // Убедитесь, что это поле есть в таблице
    ];
// app/Models/FreeLessonRequest.php
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

// app/Models/Language.php
    public function freeLessonRequests()
    {
        return $this->hasMany(FreeLessonRequest::class);
    }
}
