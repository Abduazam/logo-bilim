<div class="pb-4">
    <div class="row w-100 h-100 p-0 m-0">
        <div class="col-lg-3 col-md-4 ps-0">
            <div class="block block-rounded position-sticky" style="top: 100px;">
                <div class="block-content fs-sm">
                    <div class="col-12 px-0 mb-4">
                        <label for="begin_date" class="form-label">Begin date:</label>
                        <input wire:model.blur="begin_date" type="date" class="form-control form-control-sm w-100" id="begin_date" name="begin_date">
                    </div>
                    <div class="col-12 px-0 mb-4">
                        <label for="end_date" class="form-label">End date:</label>
                        <input wire:model.blur="end_date" type="date" class="form-control form-control-sm w-100" id="end_date" name="end_date">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-8 pe-0">
            <div class="block block-rounded">
                <div class="block-header bg-primary-dark text-white">
                    <p class="small mb-0 fw-bold">General</p>
                </div>
                <div class="block-content fs-sm">
                    <div class="table-responsive text-nowrap mb-4">
                        <table class="own-table own-table-hover w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">branch</th>
                                    <th class="text-center">count</th>
                                    <th class="text-center">income</th>
                                    <th class="text-center">teachers</th>
                                    <th class="text-center">consumption</th>
                                    <th class="text-center">benefit</th>
                                    <th class="text-center">cash</th>
                                    <th class="text-center">card</th>
                                    <th class="text-center">debt</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($appointments as $appointment)
                                <tr wire:key="daily-report-row-{{ $appointment->id }}">
                                    <td class="text-center">{{ $appointment->branch->title }}</td>
                                    <td class="text-center">{{ $appointment->count }}</td>
                                    <td class="text-center">{{ $appointment->getAsFormatted($appointment->income) }}</td>
                                    <td class="text-center">{{ $appointment->getAsFormatted($appointment->teachers) }}</td>
                                    <td class="text-center">{{ $appointment->getAsFormatted($appointment->consumption) }}</td>
                                    <td class="text-center">{{ $appointment->getAsFormatted($appointment->benefit - $appointment->consumption) }}</td>
                                    <td class="text-center">{{ $appointment->getAsFormatted($appointment->cash) }}</td>
                                    <td class="text-center">{{ $appointment->getAsFormatted($appointment->card) }}</td>
                                    <td class="text-center">{{ $appointment->getAsFormatted($appointment->debt) }}</td>
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
