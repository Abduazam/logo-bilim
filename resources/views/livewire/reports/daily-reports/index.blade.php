<div class="pb-4">
    <div class="row w-100 h-100 p-0 m-0">
        <div class="col-lg-3 col-md-4 ps-0">
            <div class="block block-rounded position-sticky" style="top: 100px;">
                <div class="block-content fs-sm">
                    <div class="col-12 px-0 mb-4">
                        <label for="begin_date" class="form-label">{{ trans('dashboard.filters.begin_date') }}:</label>
                        <input wire:model.live="begin_date" type="date" class="form-control form-control-sm w-100" id="begin_date" name="begin_date">
                    </div>
                    <div class="col-12 px-0 mb-4">
                        <label for="end_date" class="form-label">{{ trans('dashboard.filters.end_date') }}:</label>
                        <input wire:model.live="end_date" type="date" class="form-control form-control-sm w-100" id="end_date" name="end_date">
                    </div>
                    <hr>
                    <div class="col-12 px-0 mb-4">
                        <label for="branch_id" class="form-label">{{ trans('dashboard.sections.branch') }}:</label>
                        <select wire:model.live="branch_id" type="date" class="form-select form-select-sm w-100" id="branch_id" name="branch_id">
                            <x-forms.selects.options.choose />
                            @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-8 pe-0">
            <div class="block block-rounded">
                <div class="block-header bg-primary-dark text-white">
                    <p class="small mb-0 fw-bold">{{ trans('dashboard.sections.general') }}</p>
                </div>
                <div class="block-content fs-sm">
                    <div class="table-responsive text-nowrap mb-4">
                        <table class="own-table own-table-hover w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ trans('dashboard.sections.branch') }}</th>
                                    <th class="text-center">{{ trans('dashboard.fields.count') }}</th>
                                    <th class="text-center">{{ trans('dashboard.fields.income') }}</th>
                                    <th class="text-center">{{ trans('dashboard.sections.teachers') }}</th>
                                    <th class="text-center">{{ trans('dashboard.sections.consumption') }}</th>
                                    <th class="text-center">{{ trans('dashboard.fields.benefit') }}</th>
                                    <th class="text-center">{{ trans('dashboard.fields.cash') }}</th>
                                    <th class="text-center">{{ trans('dashboard.fields.card') }}</th>
                                    <th class="text-center">{{ trans('dashboard.fields.debt') }}</th>
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

            <div class="block block-rounded">
                <div class="block-header bg-primary-dark text-white">
                    <p class="small mb-0 fw-bold">{{ trans('dashboard.sections.teachers') }}</p>
                </div>
                <div class="block-content fs-sm">
                    <div class="table-responsive text-nowrap mb-4">
                        <table class="own-table own-table-hover w-100">
                            <thead>
                            <tr>
                                <th class="text-center">{{ trans('dashboard.sections.teacher') }}</th>
                                <th class="text-center">{{ trans('dashboard.fields.count') }}</th>
                                <th class="text-center">{{ trans('dashboard.fields.income') }}</th>
                                <th class="text-center">{{ trans('dashboard.fields.outcome') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr wire:key="teacher-report-row-{{ $teacher->id }}">
                                    <td class="text-center">{{ $teacher->teacher?->fullname }}</td>
                                    <td class="text-center">{{ $teacher->count }}</td>
                                    <td class="text-center">{{ $teacher->getAsFormatted($teacher->income) }}</td>
                                    <td class="text-center">{{ $teacher->getAsFormatted($teacher->teachers) }}</td>
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
