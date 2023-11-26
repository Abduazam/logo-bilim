<?php

namespace App\Services\Dashboard\Information\Teachers\Update;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Helpers\Classes\Uploads\Upload;
use App\Models\Dashboard\Information\Teachers\Teacher;
use App\Contracts\Abstracts\Services\Update\UpdateService;

class TeacherUpdateService extends UpdateService
{
    protected Teacher $teacher;
    protected string $fullname;
    protected ?string $dob;
    protected ?string $phone_number;
    protected mixed $photo;
    protected array $services;

    public function __construct(array $data, Teacher $teacher)
    {
        $this->teacher = $teacher;
        $this->fullname = $data['fullname'];
        $this->dob = $data['dob'];
        $this->phone_number = $data['phone_number'];
        $this->photo = $data['photo'];
        $this->services = $data['teacher_services'];
    }

    protected function update(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $teacherAttributes = [
                    'fullname' => $this->fullname,
                    'dob' => $this->dob,
                    'phone_number' => $this->phone_number,
                ];

                $teacherAttributes['photo'] = $this->photo;
                if (!is_null($this->photo) && $this->teacher->photo != $this->photo) {
                    $upload = new Upload($this->photo, 'teachers', $this->teacher, 'photo');
                    $teacherAttributes['photo'] = $upload->uploadMedia();
                }

                $this->teacher->update($teacherAttributes);

                $this->teacher->services()->detach();

                foreach ($this->services as $branchId => $services) {
                    foreach ($services as $serviceId => $serviceData) {
                        $salary = $serviceData['salary'];
                        $this->teacher->services()->attach($serviceId, ['branch_id' => $branchId, 'salary' => $salary, 'created_at' => now(), 'updated_at' => now()]);
                    }
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
