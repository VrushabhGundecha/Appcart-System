<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class AppcartUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $roles = ['admin', 'employee'];
        $genders = ['male', 'female'];
        $positions = ['Assistant manager', 'Team lead', 'Software engineer', 'HR'];

        foreach (range(1, 15) as $index) {
            $name = $faker->name;
            $email = $faker->unique()->safeEmail;
            $mobile = $faker->numerify('##########'); // 10 digit random number
            $gender = $faker->randomElement($genders);
            $position = $faker->randomElement($positions);
            $address = $faker->address;
            $dob = $faker->date($format = 'Y-m-d', $max = 'now');
            $salary = $faker->numberBetween($min = 1000, $max = 10000);
            $role = $faker->randomElement($roles);
            $password = Hash::make('password'); // Hash the password

            DB::table('appcart_users')->insert([
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                'gender' => $gender,
                'position' => $position,
                'address' => $address,
                'dob' => $dob,
                'salary' => $salary,
                'role' => $role,
                'password' => $password,
            ]);
        }
    }
}
