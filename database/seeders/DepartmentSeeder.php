<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'BCA'],
            ['name' => 'BIM'],
          
        ];
        foreach($departments as $department){
            Department::create($department);
        }

        //
    }
}
