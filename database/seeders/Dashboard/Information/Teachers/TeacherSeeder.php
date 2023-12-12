<?php

namespace Database\Seeders\Dashboard\Information\Teachers;

use Illuminate\Database\Seeder;
use App\Models\Dashboard\Information\Teachers\Teacher;
use App\Models\Dashboard\Information\Teachers\TeacherService;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            // Branch 1
            [
                'teacher' => [
                    'fullname' => "Durdona Qurbonova",
                    'dob' => '1995-10-20',
                    'phone_number' => '998911234567',
                ],
                'services' => [
                    [
                        'branch_id' => 1,
                        'service_id' => 1,
                        'salary' => 80000,
                    ],
                ]
            ],
            [
                'teacher' => [
                    'fullname' => "Asal Shodiyeva",
                    'dob' => '1992-05-06',
                    'phone_number' => '998911234567',
                ],
                'services' => [
                    [
                        'branch_id' => 1,
                        'service_id' => 1,
                        'salary' => 85000,
                    ],
                ]
            ],
            [
                'teacher' => [
                    'fullname' => "Lola",
                    'dob' => '1985-09-04',
                    'phone_number' => '998945550505',
                ],
                'services' => [
                    [
                        'branch_id' => 1,
                        'service_id' => 2,
                        'salary' => 55000,
                    ],
                ]
            ],
            [
                'teacher' => [
                    'fullname' => "Rayxon",
                    'dob' => '1978-09-16',
                    'phone_number' => '998945550505',
                ],
                'services' => [
                    [
                        'branch_id' => 1,
                        'service_id' => 2,
                        'salary' => 66000,
                    ],
                ]
            ],
            [
                'teacher' => [
                    'fullname' => "Shahzoda",
                    'dob' => '1979-07-28',
                    'phone_number' => '998977071122',
                ],
                'services' => [
                    [
                        'branch_id' => 1,
                        'service_id' => 3,
                        'salary' => 60000,
                    ],
                ]
            ],
            [
                'teacher' => [
                    'fullname' => "Munisa Rizayeva",
                    'dob' => '1986-10-21',
                    'phone_number' => '998977071122',
                ],
                'services' => [
                    [
                        'branch_id' => 1,
                        'service_id' => 3,
                        'salary' => 70000,
                    ],
                ]
            ],
            // Branch 2
            [
                'teacher' => [
                    'fullname' => "Yulduz Usmonova",
                    'dob' => '1963-12-12',
                    'phone_number' => '998936066606',
                ],
                'services' => [
                    [
                        'branch_id' => 2,
                        'service_id' => 1,
                        'salary' => 50000,
                    ],
                ]
            ],
            [
                'teacher' => [
                    'fullname' => "Halima",
                    'dob' => '1963-12-12',
                    'phone_number' => '998936066606',
                ],
                'services' => [
                    [
                        'branch_id' => 2,
                        'service_id' => 1,
                        'salary' => 55000,
                    ],
                ]
            ],
            // Branch 3
            [
                'teacher' => [
                    'fullname' => "Shahlo Ahmedova",
                    'dob' => '1994-07-18',
                    'phone_number' => '998990001122',
                ],
                'services' => [
                    [
                        'branch_id' => 3,
                        'service_id' => 1,
                        'salary' => 100000,
                    ],
                ]
            ],
            [
                'teacher' => [
                    'fullname' => "Zarina Nizomiddinova",
                    'dob' => '1989-03-29',
                    'phone_number' => '998990001122',
                ],
                'services' => [
                    [
                        'branch_id' => 3,
                        'service_id' => 2,
                        'salary' => 90000,
                    ],
                ]
            ],
        ];

        foreach ($teachers as $teacher) {
            $newTeacher = Teacher::create($teacher['teacher']);

            foreach ($teacher['services'] as $service) {
                $service['teacher_id'] = $newTeacher->id;
                TeacherService::create($service);
            }
        }
    }
}
