<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Grade::insert([
            [
                'grade' => 'A+',
                'from' => 90,
                'to' => 100,
            ],
            [
                'grade' => 'A',
                'from' => 80,
                'to' => 89,
            ],
            [
                'grade' => 'B+',
                'from' => 70,
                'to' => 79,
            ],
            [
                'grade' => 'B',
                'from' => 60,
                'to' => 69,
            ],
            [
                'grade' => 'C',
                'from' => 50,
                'to' => 59,
            ],
            [
                'grade' => 'D',
                'from' => 40,
                'to' => 49,
            ],
            [
                'grade' => 'F',
                'from' => 0,
                'to' => 39,
            ],

        ]);
    }
}
