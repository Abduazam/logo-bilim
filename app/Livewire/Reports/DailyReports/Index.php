<?php

namespace App\Livewire\Reports\DailyReports;

use Livewire\Component;
use Illuminate\View\View;
use App\Repositories\Dashboard\Information\Branches\BranchRepository;
use App\Contracts\Traits\Dashboard\Livewire\General\ReportFilterTrait;
use App\Repositories\Dashboard\Reports\DailyReports\DailyReportRepository;

class Index extends Component
{
    use ReportFilterTrait;

    public function mount(): void
    {
        $this->setDefaultBeginDate();
        $this->setDefaultEndDate();
    }

    public function render(
        DailyReportRepository $dailyReportRepository,
        BranchRepository $branchRepository
    ): View
    {
        return view('livewire.reports.daily-reports.index', [
            'appointments' => $dailyReportRepository->getAppointmentFiltered($this->begin_date, $this->end_date),
            'teachers' => $dailyReportRepository->getTeachersReport($this->begin_date, $this->end_date, $this->branch_id),
            'branches' => $branchRepository->getByUser(auth()->user())
        ]);
    }
}
