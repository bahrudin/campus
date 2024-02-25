<?php
/*
 * Copyright (c) 2024. Bahrudin Ardiansyah | bahrudin.no8@gmail.com
 */

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $title = ['Pancasila','Basic Programming', 'Basic Database','English Basic','English Mahir', 'Digital Business', 'Bahasa Local', 'Methodology R&D', 'Economy Muslim'];

        foreach ($title as $item) {
            Lesson::query()->create([
               'title' => $item,
               'descriptions' => fake()->sentence
            ]);
        }
    }
}
