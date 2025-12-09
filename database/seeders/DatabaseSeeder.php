<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Juan Dela Cruz',
            'email' => 'juan@mail.com',
            'password' => '123'
        ]);

        $courses = ['BSIT', 'BSCS', 'BSCRIM', 'BSN'];

        foreach($courses as $course){
            Course::create([
                'name' => $course
            ]);
        }

        // Student::create([
        //     'first_name' => 'Juan',
        //     'middle_name' => 'Santos',
        //     'last_name' => 'Dela Cruz',
        //     'age' => 19,
        //     'email' => 'juan@mail.com',
        //     'address' => 'Roxas City',
        //     'course' => 'BSIT'
        // ]);

        Student::factory(30)->create();
    }
}
