<?php

namespace App\Livewire\Management\Consultations\Traits;

use App\Models\Dashboard\Information\Clients\Client;

trait ActionOnConsultationCreate
{
    public function updated($property): void
    {
        switch ($property) {
            case 'form.created_date':
                $this->form->clearData(true, true);
                $this->form->setStartTimes();
                break;
            case 'form.start_time':
                $this->form->setEndTimes();
                break;
            case 'form.end_time':
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
                $this->form->setClientName();
            }

            $this->form->checkRegistrationFormTrue();
        }

        if (str_starts_with($property, 'form.payments')) {
            $this->form->checkRegistrationFormTrue();
        }
    }

    public function setClientInfo(Client $client): void
    {
        $this->form->setClientInfo($client);
    }

    public function clearClientInfo(): void
    {
        $this->form->clearClientInfo();
    }

    public function addRelative(): void
    {
        $this->form->addRelative();
    }

    public function removeRelative(int $relativeIndex): void
    {
        $this->form->removeRelative($relativeIndex);
    }
}
