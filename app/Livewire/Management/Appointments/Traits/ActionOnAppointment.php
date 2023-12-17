<?php

namespace App\Livewire\Management\Appointments\Traits;

use App\Models\Dashboard\Information\Clients\Client;

trait ActionOnAppointment
{
    public function updated($property): void
    {
        switch ($property) {
            case 'form.branch_id':
                $this->form->setServices();
                $this->form->clearIds(true, true, true);
                break;
            case 'form.service_id':
                $this->form->setTeachers();
                $this->form->setTimes();
                $this->form->setServicePrice();
                $this->form->clearIds(false, true, true);
                break;
            case 'form.teacher_id':
                $this->form->setTimes();
                $this->form->setTeacherSalary();
                $this->form->checkRegistrationFormTrue();
                break;
            case 'form.start_time':
                $this->form->setFreeTeachers();
                $this->form->clearIds(false, true, false);
                $this->form->checkRegistrationFormTrue();
                break;
            case 'form.search':
                if ($this->form->search == '') {
                    $this->form->clearSearch();
                } else {
                    $this->form->setSearchedClients();
                }
                break;
        }

        if (str_starts_with($property, 'form.clients')) {
            $parts = explode('.', $property);
            if (end($parts) === 'first_name') {
                $this->form->setClientName($parts[2]);
            }
            $this->form->checkRegistrationFormTrue();
        }

        if (str_starts_with($property, 'form.payments')) {
            $parts = explode('.', $property);
            if (in_array(end($parts), ['payment_amount', 'teacher_salary'])) {
                $this->form->setBenefit($parts[2]);
            }
            $this->form->checkPaymentsFormTrue();
        }
    }

    public function changeActiveSection(string $section): void
    {
        $this->form->activeSection = $section;
    }

    public function addClient(): void
    {
        $this->form->addClient();
    }

    public function removeClient(int $index): void
    {
        $this->form->removeClient($index);
    }

    public function setClientInfo(Client $client): void
    {
        $this->form->setClientInfo($client);
    }

    public function clearClientInfo(int $index): void
    {
        $this->form->clearClientInfo($index);
    }

    public function addRelative(int $index): void
    {
        $this->form->addRelative($index);
    }

    public function removeRelative(int $clientIndex, int $relativeIndex): void
    {
        $this->form->removeRelative($clientIndex, $relativeIndex);
    }
}
