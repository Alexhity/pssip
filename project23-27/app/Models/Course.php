<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $fillable = ['title', 'description', 'teacher_id', 'language_id', 'price'];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
