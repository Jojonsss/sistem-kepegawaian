<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun admin
        User::firstOrCreate(
            ['email' => 'admin@kepegawaian.test'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );

        // Membuat 3 departemen
        $it = Department::firstOrCreate([
            'name' => 'Teknologi Informasi',
        ]);

        $hr = Department::firstOrCreate([
            'name' => 'Sumber Daya Manusia',
        ]);

        $finance = Department::firstOrCreate([
            'name' => 'Keuangan',
        ]);

        // Membuat 5 pegawai beserta departemennya
        $employees = [
            [
                'department_id' => $it->id,
                'name' => 'Andi Saputra',
                'position' => 'Programmer',
                'salary' => 6500000,
                'joined_at' => '2024-01-15',
            ],
            [
                'department_id' => $it->id,
                'name' => 'Budi Santoso',
                'position' => 'System Analyst',
                'salary' => 7000000,
                'joined_at' => '2024-03-01',
            ],
            [
                'department_id' => $hr->id,
                'name' => 'Citra Lestari',
                'position' => 'HR Officer',
                'salary' => 5500000,
                'joined_at' => '2023-08-10',
            ],
            [
                'department_id' => $finance->id,
                'name' => 'Dewi Anggraini',
                'position' => 'Accountant',
                'salary' => 6000000,
                'joined_at' => '2023-11-20',
            ],
            [
                'department_id' => $finance->id,
                'name' => 'Eko Pratama',
                'position' => 'Finance Staff',
                'salary' => 5000000,
                'joined_at' => '2024-06-05',
            ],
        ];

        foreach ($employees as $employee) {
            Employee::firstOrCreate(
                [
                    'department_id' => $employee['department_id'],
                    'name' => $employee['name'],
                ],
                [
                    'position' => $employee['position'],
                    'salary' => $employee['salary'],
                    'joined_at' => $employee['joined_at'],
                ]
            );
        }
    }
}