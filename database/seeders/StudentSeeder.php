<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Studnet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                "name" => "Bob"
            ],
            [
                "name" => "Alice"
            ],
            [
                "name" => "Tom"
            ],
            [
                "name" => "David"
            ]
        ];

        foreach($students as $student) {
            Student::create($student);
        }
    }
}
