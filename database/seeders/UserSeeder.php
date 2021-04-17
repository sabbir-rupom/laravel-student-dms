<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateUserTables();

        \App\Models\User::firstOrCreate([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1123'),
        ]);

        $faker = Faker::create();

        foreach (range(1, 25) as $index) {
            \App\Models\Student::create([
                'fullname' => $faker->firstname,
                'roll' => $index,
                'propic' => null,
            ]);
        }
    }

    /**
     * Truncates users table
     *
     * @return  void
     */
    public function truncateUserTables()
    {
        $this->command->info('Truncating User table');

        $usersTable = (new \App\Models\User)->getTable();
        DB::table($usersTable)->truncate();

        $studentTable = (new \App\Models\Student())->getTable();
        DB::table($studentTable)->truncate();

    }
}
