<div class="pb-4">
    <div class="row w-100 h-100 p-0 m-0">
        <div class="col-lg-3 col-md-4 ps-0">
            <div class="block block-rounded position-sticky" style="top: 100px;">
                <div class="block-content fs-sm">
                    <div class="col-12 px-0 mb-4">
                        <label for="begin_date" class="form-label">{{ trans('dashboard.filters.begin_date') }}:</label>
                        <input wire:model.blur="begin_date" type="date" class="form-control form-control-sm w-100" id="begin_date" name="begin_date">
                    </div>
                    <div class="col-12 px-0 mb-4">
                        <label for="end_date" class="form-label">{{ trans('dashboard.filters.end_date') }}:</label>
                        <input wire:model.blur="end_date" type="date" class="form-control form-control-sm w-100" id="end_date" name="end_date">
                    </div>
                    <div class="col-12 px-0 mb-4">
                        <label for="teacher_id" class="form-label">{{ trans('dashboard.sections.teacher') }}:</label>
                        <select wire:model.live="teacher_id" class="form-select form-select-sm w-100" name="teacher_id" id="teacher_id">
                            <x-forms.selects.options.choose />
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->fullname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-8 pe-0">
            <div class="block block-rounded">
                <div class="block-header bg-primary-dark text-white">
                    <p class="small mb-0 fw-bold">{{ trans('dashboard.sections.appointments') }}</p>
                </div>
                <div class="block-content fs-sm">
                    <div class="table-responsive text-nowrap mb-4">
                        <table class="own-table w-100">
                            <thead>
                            <tr>
                                <th class="text-center">{{ trans('dashboard.sections.teacher') }}</th>
                                <th class="text-center">{{ trans('dashboard.sections.client') }}</th>
                                <th class="text-center">{{ trans('dashboard.fields.date') }}</th>
                                <th class="text-center">{{ trans('dashboard.fields.amount') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                <tr wire:key="debt-row-{{ $appointment->id }}">
                                    <td class="text-center">{{ $appointment->teacher?->fullname }}</td>
                                    <td class="text-center">{{ $appointment->getClients() }}</td>
                                    <td class="text-center">{{ $appointment->created_date }}</td>
                                    <td class="text-center">{{ $appointment->total_payment }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @can('dashboard.management.consultations.index')
            <div class="block block-rounded">
                <div class="block-header bg-primary-dark text-white">
                    <p class="small mb-0 fw-bold">{{ trans('dashboard.sections.consultations') }}</p>
                </div>
                <div class="block-content fs-sm">
                    <div class="table-responsive text-nowrap mb-4">
                        <table class="own-table w-100">
                            <thead>
                            <tr>
                                <th class="text-center">{{ trans('dashboard.sections.client') }}</th>
                                <th class="text-center">{{ trans('dashboard.fields.date') }}</th>
                                <th class="text-center">{{ trans('dashboard.fields.time') }}</th>
                                <th class="text-center">{{ trans('dashboard.fields.amount') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($consultations as $consultation)
                                <tr wire:key="debt-row-{{ $consultation->id }}">
                                    <td class="text-center">{{ $consultation->client->first_name . ' ' . $consultation->client->last_name }}</td>
                                    <td class="text-center">{{ $consultation->getDate() }}</td>
                                    <td class="text-center">{{ $consultation->getFullTime() }}</td>
                                    <td class="text-center">{{ $consultation->payment_amount }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </div>
</div>
