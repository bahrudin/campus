<?php
/*
 * Copyright (c) 2024. Bahrudin Ardiansyah | bahrudin.no8@gmail.com
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;
    protected $table = 'academic_documents';
    protected $fillable = ['student_id','slug','file_path','full_path'];

    /**
     * Syntax: return $this->belongsTo(Student::class, 'foreign_key', 'owner_key');
     * Example: return $this->belongsTo(Student::class, 'student_id', 'id');
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
