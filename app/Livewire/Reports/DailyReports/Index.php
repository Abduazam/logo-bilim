<?php

namespace App\Livewire\Reports\DailyReports;

use App\Repositories\Dashboard\Reports\DailyReports\DailyReportRepository;
use Livewire\Component;
use Illuminate\View\View;
use App\Livewire\Reports\DailyReports\Traits\FilterTrait;

class Index extends Component
{
    use FilterTrait;

    public function mount(): void
    {
        $this->setDefaultBeginDate();
    }

    public function render(DailyReportRepository $dailyReportRepository): View
    {
        return view('livewire.reports.daily-reports.index', [
            'reports' => $dailyReportRepository->getFiltered($this->begin_date)
        ]);
    }
}
