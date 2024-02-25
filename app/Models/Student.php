<?php
/*
 * Copyright (c) 2024. Bahrudin Ardiansyah | bahrudin.no8@gmail.com
 */

namespace App\Models;

use App\Enums\GenderEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $table = 'academic_students';
    protected $fillable = ['nik', 'name', 'gender', 'address'];

    /**
     * @return Attribute
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtolower($value)
        );
    }

    /**
     * Get the lessons for the student.
     */
    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class, 'academic_lesson_student', 'student_id', 'lesson_id');
    }

    /**
     * Syntax: return $this->hasMany(Document::class, 'foreign_key', 'local_key');
     * Example: return $this->hasMany(Document::class, 'post_id', 'id');
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class,'student_id','id');
    }
}
