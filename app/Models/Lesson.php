<?php
/*
 * Copyright (c) 2024. Bahrudin Ardiansyah | bahrudin.no8@gmail.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'academic_lessons';
    protected $fillable = ['title', 'descriptions'];

    /**
     * Get the students for the lesson.
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'academic_lesson_student', 'lesson_id', 'student_id');
    }

}
