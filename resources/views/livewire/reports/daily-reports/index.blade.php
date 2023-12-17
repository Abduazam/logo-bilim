<div class="pb-4">
    <div class="row w-100 h-100 p-0 m-0">
        <div class="col-lg-3 col-md-4 ps-0">
            <div class="block block-rounded">
                <div class="block-content fs-sm">
                    <div class="col-12 px-0 mb-4">
                        <label for="begin_date" class="form-label">Begin date:</label>
                        <input wire:model.live="begin_date" type="date" class="form-control form-control-sm w-100" id="begin_date" name="begin_date">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-8 pe-0">
            <div class="row w-100 h-auto p-0 m-0">
                <div class="col-md-6 ps-0">
                    <div class="block block-rounded">
                        <div class="block-content fs-sm pb-4">
                            <livewire:livewire-column-chart key="{{ $countChart->reactiveKey() }}" :column-chart-model="$countChart" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ps-0">
                    <div class="block block-rounded">
                        <div class="block-content fs-sm pb-4">
                            <livewire:livewire-pie-chart key="{{ $benefitChart->reactiveKey() }}" :pie-chart-model="$benefitChart" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="block block-rounded">
                <div class="block-content fs-sm">
                    <div class="table-responsive text-nowrap mb-4">
                        <table class="own-table w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">branch</th>
                                    <th class="text-center">count</th>
                                    <th class="text-center">income</th>
                                    <th class="text-center">outcome</th>
                                    <th class="text-center">benefit</th>
                                    <th class="text-center">debts</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                <tr>
                                    <td class="text-center">{{ $report->branch->title }}</td>
                                    <td class="text-center">{{ $report->count }}</td>
                                    <td class="text-center">{{ $report->getIncome() }}</td>
                                    <td class="text-center">{{ $report->getOutcome() }}</td>
                                    <td class="text-center">{{ $report->getBenefit() }}</td>
                                    <td class="text-center">{{ $report->debts }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
