<?php

namespace App\Livewire\Management\Appointments\Forms\Traits;

use Livewire\Attributes\Validate;
use App\Models\Dashboard\Information\Services\Service;
use App\Models\Dashboard\Information\Teachers\TeacherService;

trait PaymentsForm
{
    public bool $paymentsForm = false;

    #[Validate('required|numeric')]
    public ?int $service_price = null;

    #[Validate('required|array')]
    public array $payments = [];

    public array $payment = [
        'client_name' => null,
        'payment_amount' => null,
        'payment_type_id' => null,
        'teacher_salary' => null,
        'benefit' => null,
    ];

    public function setServicePrice(): void
    {
        $service = Service::findOrFail($this->service_id);
        $this->service_price = $service->getPrice($this->branch_id);
    }

    public function addPayment(): void
    {
        $this->payments[] = $this->payment;
        $this->setTeacherSalary();
        $this->checkPaymentsFormTrue();
    }

    public function removePayment(int $index): void
    {
        unset($this->payments[$index]);
    }

    public function setClientName(int $index): void
    {
        $this->payments[$index]['client_name'] = $this->clients[$index]['info']['first_name'];
    }

    public function setTeacherSalary(): void
    {
        $teacherSalary = TeacherService::where([
            ['branch_id', '=', $this->branch_id],
            ['teacher_id', '=', $this->teacher_id],
            ['service_id', '=', $this->service_id],
        ])->value('salary');

        foreach ($this->payments as &$payment) {
            $payment['teacher_salary'] = $teacherSalary;
        }
        unset($payment);
    }

    public function setBenefit(int $index): void
    {
        $paymentAmount = intval($this->payments[$index]['payment_amount']);
        $teacherSalary = intval($this->payments[$index]['teacher_salary']);

        $this->payments[$index]['benefit'] = $paymentAmount - $teacherSalary;
    }

    public function checkPaymentsFormTrue(): void
    {
        $paymentsNotNull = false;
        foreach ($this->payments as $payment) {
            $requiredInfo = ['client_name', 'payment_amount', 'payment_type_id', 'teacher_salary', 'benefit'];

            $allInfoNotNull = array_reduce($requiredInfo, function ($carry, $field) use ($payment) {
                return $carry && isNotNullAndNotEmptyString($payment[$field]);
            }, true);

            if ($allInfoNotNull) {
                $paymentsNotNull = true;
            } else {
                $paymentsNotNull = false;
            }
        }

        $this->paymentsForm = !is_null($this->service_price) && $paymentsNotNull;
    }
}
