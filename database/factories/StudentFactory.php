<?php

namespace Database\Factories;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Student::class;

    public function definition(): array
    {
        $gender = $this->faker->randomElement(['M', 'F']);
        $nik = $this->generateUniqueNik();

        return [
            'name' => $this->faker->name($gender),
            'address' => $this->faker->address,
            'gender' => $gender,
            'nik' => $nik,
        ];
    }

    /**
     * Generate a unique NIK based on year, month, and sequence number.
     *
     * @return string
     */
    private function generateUniqueNik()
    {
        // Get the current year and month
        $yearMonth = Carbon::now()->format('Ym');

        // Get the latest student with the same year and month in NIK
        $lastStudent = Student::where('nik', 'like', $yearMonth . '%')->latest()->first();

        // Extract the sequence number from the latest student's NIK
        $lastSequence = $lastStudent ? intval(substr($lastStudent->nik, -4)) : 0;

        // Increment the sequence number until a unique NIK is found
        $newSequence = $lastSequence + 1;

        // Format the sequence number with leading zeros
        $formattedSequence = str_pad($newSequence, 4, '0', STR_PAD_LEFT);

        // Generate the NIK
        $nik = $yearMonth . $formattedSequence;

        // Check if the generated NIK already exists
        $existingStudent = Student::where('nik', $nik)->exists();

        // If the generated NIK already exists, recursively call the method until a unique NIK is generated
        if ($existingStudent) {
            return $this->generateUniqueNik();
        }

        return $nik;
    }
}
