<?php

namespace App\Livewire\Reports\DailyReports;

use Livewire\Component;
use Illuminate\View\View;
use App\Contracts\Traits\Dashboard\Livewire\General\ReportFilterTrait;
use App\Repositories\Dashboard\Reports\DailyReports\DailyReportRepository;

class Index extends Component
{
    use ReportFilterTrait;

    public function mount(): void
    {
        $this->setDefaultBeginDate();
    }

    public function render(DailyReportRepository $dailyReportRepository): View
    {
        return view('livewire.reports.daily-reports.index', [
            'appointments' => $dailyReportRepository->getAppointmentFiltered($this->begin_date, $this->end_date),
        ]);
    }
}
