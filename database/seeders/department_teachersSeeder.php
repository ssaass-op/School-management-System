<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class department_teachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assignments = [
            ['department_id' => 1, 'teacher_id' => 1],
            ['department_id' => 2, 'teacher_id' => 2],
            ['department_id' => 1, 'teacher_id' => 3],
        ];
        foreach ($assignments as $assignment) {
            DB::table('department_has_teachers')->insert([
                'department_id' => $assignment['department_id'],
                'teacher_id'    => $assignment['teacher_id'],
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
