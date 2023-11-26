<?php

namespace App\Services\Dashboard\Information\Teachers\Create;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Helpers\Classes\Uploads\Upload;
use App\Models\Dashboard\Information\Teachers\Teacher;
use App\Contracts\Abstracts\Services\Create\CreateService;

class TeacherCreateService extends CreateService
{
    protected string $fullname;
    protected ?string $dob;
    protected ?string $phone_number;
    protected mixed $photo;
    protected array $services;

    public function __construct(array $data)
    {
        $this->fullname = $data['fullname'];
        $this->dob = $data['dob'];
        $this->phone_number = $data['phone_number'];
        $this->photo = $data['photo'];
        $this->services = $data['teacher_services'];
    }

    protected function create(): bool|Exception
    {
        try {
            DB::transaction(function () {
                $photo = null;
                if (!is_null($this->photo)) {
                    $upload = new Upload($this->photo, 'teachers');
                    $photo = $upload->uploadMedia();
                }

                $teacher = Teacher::create([
                    'fullname' => $this->fullname,
                    'dob' => $this->dob,
                    'phone_number' => $this->phone_number,
                    'photo' => $photo,
                ]);

                foreach ($this->services as $branchId => $services) {
                    foreach ($services as $serviceId => $serviceData) {
                        $salary = $serviceData['salary'];

                        $teacher->services()->attach($serviceId, ['branch_id' => $branchId, 'salary' => $salary, 'created_at' => now(), 'updated_at' => now()]);
                    }
                }
            }, 5);

            return true;
        } catch (Exception $exception) {
            return $exception;
        }
    }
}
