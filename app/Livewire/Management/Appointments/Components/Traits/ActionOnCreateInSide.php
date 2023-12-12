<?php

namespace App\Livewire\Management\Appointments\Components\Traits;

use Livewire\Attributes\On;
use App\Models\Dashboard\Information\Clients\Client;

trait ActionOnCreateInSide
{
    public function updated($property): void
    {
        if ($property === 'form.search' and $this->form->search != '') {
            $this->form->setClients();
        }

        if ($property === 'form.first_name' or $property === 'form.last_name') {
            $this->form->activateSectionClient();
        }

        if (str_starts_with($property, 'form.relatives')) {
            $this->form->activateSectionClient();
        }

        if ($property === 'form.branch_id') {
            $this->form->setServices();
            $this->form->clearIds(true, true, true);
        }

        if ($property === 'form.service_id') {
            $this->form->setTeachers();
            $this->form->setTimes();
            $this->form->setServicePrice();
            $this->form->clearIds(false, true, true);
        }

        if ($property === 'form.teacher_id') {
            $this->form->setTimes();
            $this->form->setTeacherSalary();
            $this->form->activateSectionAppointment();
            $this->form->clearIds(false, false, true);
        }

        if ($property === 'form.start_time') {
            $this->form->setFreeTeachers();
            $this->form->activateSectionAppointment();
        }

        if ($property === 'form.payment_amount' or $property === 'form.payment_type_id') {
            $this->form->setBenefit();
            $this->form->activateSectionAppointment();
        }
    }

    public function changeActiveSection(string $section): void
    {
        $this->form->activeSection = $section;
    }

    public function setClient(Client $client): void
    {
        $this->form->setClient($client);
    }

    public function unsetClient(): void
    {
        $this->form->unsetClient();
    }

    #[On('check-relatives')]
    public function checkRelatives(): void
    {
        $this->form->activateSectionClient();
    }
}
