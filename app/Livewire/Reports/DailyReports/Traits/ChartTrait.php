<?php

namespace App\Livewire\Reports\DailyReports\Traits;

use Asantibanez\LivewireCharts\Models\PieChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

trait ChartTrait
{
    protected array $colors = ['#f6ad55', '#fc8181', '#90cdf4'];

    public function getCountChart($reports): ColumnChartModel
    {
        $columnChartModel = (new ColumnChartModel())
            ->setTitle('Count')
            ->setAnimated(true)
            ->setOpacity(1)
            ->withDataLabels()
            ->setColumnWidth(30);

        foreach ($reports as $id => $report) {
            $branch = $report->branch->title;
            $count = $report->count;

            $columnChartModel->addColumn($branch, $count, $this->colors[$id]);
        }

        $columnChartModel->withoutLegend();

        return $columnChartModel;
    }

    public function getBenefitChart($reports): PieChartModel
    {
        $pieChartModel = (new PieChartModel())
            ->setTitle('Benefit')
            ->setAnimated(true)
            ->setOpacity(1)
            ->withDataLabels()
            ->setJsonConfig([
                'plotOptions.pie.startAngle' => 0,
                'plotOptions.pie.endAngle' => 360,
                'plotOptions.pie.offsetY' => 10,
                'grid.padding.bottom' => -60,
            ]);

        foreach ($reports as $id => $report) {
            $branch = $report->branch->title;
            $benefit = intval($report->benefit);

            $pieChartModel->addSlice($branch, $benefit, $this->colors[$id], ['1']);
        }

        $pieChartModel->withoutLegend();

        return $pieChartModel;
    }
}
