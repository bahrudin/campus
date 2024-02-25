<?php
/*
 * Copyright (c) 2024. Bahrudin Ardiansyah | bahrudin.no8@gmail.com
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LessonController;


Route::get('/students/data', [StudentController::class,'getData'])->name('students.data');
Route::resource('students', StudentController::class);

Route::get('/lessons/data', [LessonController::class,'getData'])->name('lessons.data');
Route::get('/autocomplete-students', [LessonController::class, 'autocomplete'])->name('autocomplete.students');
Route::resource('lessons', LessonController::class);
