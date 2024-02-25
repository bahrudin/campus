<?php
/*
 * Copyright (c) 2024. Bahrudin Ardiansyah | bahrudin.no8@gmail.com
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('academic_students', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 50)->unique();
            $table->string('name', 150);
            $table->enum('gender',['Perempuan','Laki-laki'])->nullable();
//            $table->string('gender')->default(\App\Enums\GenderEnum::Male->value);
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_students');
    }
};
