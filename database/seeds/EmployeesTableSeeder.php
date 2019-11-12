<?php

use App\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' => 'Kyaw Kyaw',
            'gender' => 'male',
            'age' => 23,
            'email' => 'kyaw23@gmail.com',
            'address' => 'Yangon, Sanchaung',
            'position' => 'Web Developer',
        ]);
        Employee::create([
            'name' => 'Aung Aung',
            'gender' => 'male',
            'age' => 24,
            'email' => 'aung24@gmail.com',
            'address' => 'Yangon, Tamwe',
            'position' => 'Web Developer',
        ]);
        Employee::create([
            'name' => 'Zaw Zaw',
            'gender' => 'male',
            'age' => 22,
            'email' => 'zaw22@gmail.com',
            'address' => 'Yangon, Myaynigone',
            'position' => 'Web Developer',
        ]);
        Employee::create([
            'name' => 'Mya Mya',
            'gender' => 'female',
            'age' => 25,
            'email' => 'mya25@gmail.com',
            'address' => 'Yangon, Pazuntaung',
            'position' => 'Web Developer',
        ]);
        Employee::create([
            'name' => 'Aye Aye',
            'gender' => 'female',
            'age' => 21,
            'email' => 'aye21@gmail.com',
            'address' => 'Yangon, Latha',
            'position' => 'Web Developer',
        ]);
    }
}
