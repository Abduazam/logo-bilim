<?php

namespace App\Livewire\Reports\DailyReports;

use Livewire\Component;
use Illuminate\View\View;
use App\Livewire\Reports\DailyReports\Traits\ChartTrait;
use App\Livewire\Reports\DailyReports\Traits\FilterTrait;
use App\Repositories\Dashboard\Reports\DailyReports\DailyReportRepository;

class Index extends Component
{
    use FilterTrait, ChartTrait;

    public function mount(): void
    {
        $this->setDefaultBeginDate();
    }

    public function render(DailyReportRepository $dailyReportRepository): View
    {
        $reports = $dailyReportRepository->getFiltered($this->begin_date);

        return view('livewire.reports.daily-reports.index', [
            'reports' => $reports,
            'countChart' => $this->getCountChart($reports),
            'benefitChart' => $this->getBenefitChart($reports),
        ]);
    }
}
