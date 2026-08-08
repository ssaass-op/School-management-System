<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            ['name' => 'Ramesh Sharma'],
            ['name' => 'Sunita Karki'],
            ['name' => 'Bikash Thapa'],
        ];
        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}
