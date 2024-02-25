<?php
/*
 * Copyright (c) 2024. Bahrudin Ardiansyah | bahrudin.no8@gmail.com
 */

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Lesson;

class LessonStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        $lessons = Lesson::all();

        foreach ($students as $student) {
            $student->lessons()->attach($lessons->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}
