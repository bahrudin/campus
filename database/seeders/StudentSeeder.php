<?php
/*
 * Copyright (c) 2024. Bahrudin Ardiansyah | bahrudin.no8@gmail.com
 */

namespace Database\Seeders;

use App\Enums\GenderEnum;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        $year = date('Y');
        $month = date('m');
        $address = ['Brebes','Tegal','Bulakamba','Losari','Ora ngapak ora kepenak'];

        // Ambil nomor urut terakhir untuk bulan ini, jika ada
        $lastStudent = Student::whereYear('created_at', $year)->whereMonth('created_at', $month)->orderBy('id', 'desc')->first();
        $lastNikNumber = $lastStudent ? (int)substr($lastStudent->nik, -4) : 0;

        // Loop 20 data dummy
        for ($i = 0; $i < 50; $i++) {
            // Increment nomor urut
            $newNikNumber = str_pad($lastNikNumber + $i + 1, 4, '0', STR_PAD_LEFT);
            // Generate NIK
            $nik = $year . $month . $newNikNumber;

            Student::create([
//                'nik' => $faker->dateTimeBetween('-1 years','now','Asia/Jakarta')->format('Ym').'000'.$i,
                'nik' => $nik,
                'name' => $faker->name,
//                'gender' => $faker->randomElement(['M', 'F']),
                'gender' => fake()->randomElement(GenderEnum::cases())->value,
                'address' => $faker->randomElement($address).', '.$faker->address,
            ]);
        }
    }
}
