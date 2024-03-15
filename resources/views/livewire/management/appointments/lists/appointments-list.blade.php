<div>
    <div class="filter-table pb-4">
        <div class="row w-100 h-100 m-0 p-0">
            <div class="col-md-10 col-8 ps-0">
                <div class="row w-100 h-100 m-0 p-0">
                    <div class="col-md-4 col-6 ps-0 mb-3">
                        <label for="branch_id" class="w-100">
                            <select wire:model.live="branch_id" class="form-select form-select-sm" name="branch_id" id="branch_id">
                                <option value="0">{{ trans('dashboard.filters.all-with') }} {{ strtolower(trans('dashboard.sections.branches')) }}</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->title }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="col-md-4 col-6 ps-0 mb-3">
                        <label for="teacher_id" class="w-100">
                            <select wire:model.live="teacher_id" class="form-select form-select-sm" name="teacher_id" id="teacher_id">
                                <option value="0">{{ trans('dashboard.filters.all-with') }} {{ strtolower(trans('dashboard.sections.teachers')) }}</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->fullname }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="col-md-4 col-6 ps-0 mb-3">
                        <label for="service_id" class="w-100">
                            <select wire:model.live="service_id" class="form-select form-select-sm" name="service_id" id="service_id">
                                <option value="0">{{ trans('dashboard.filters.all-with') }} {{ strtolower(trans('dashboard.sections.services')) }}</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->title }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="col-md-3 col-6 ps-0">
                        <label for="appointment_status_id" class="w-100">
                            <select wire:model.live="appointment_status_id" class="form-select form-select-sm" name="appointment_status_id" id="appointment_status_id">
                                <option value="0">{{ trans('dashboard.sections.status') }}</option>
                                @foreach($appointmentStatuses as $appointmentStatus)
                                    <option value="{{ $appointmentStatus->id }}">{{ $appointmentStatus->title }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="col-md-3 col-6 ps-0">
                        <label for="hour" class="w-100">
                            <select wire:model.live="hour" class="form-select form-select-sm" name="hour" id="hour">
                                <option value="0">{{ trans('dashboard.filters.hours') }}</option>
                                @foreach($hours as $hour)
                                    <option value="{{ $hour }}">{{ $hour }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="col-md-3 col-6 ps-0">
                        <label for="created_date" class="w-100">
                            <input type="date" wire:model.live="created_date" class="form-control form-control-sm" name="created_date" id="created_date">
                        </label>
                    </div>
                    <div class="col-md-3 col-6 ps-0">
                        <x-sections.fillers.per-page />
                    </div>

                </div>
            </div>
            <div class="col-md-2 col-4 text-end pe-0">
                <livewire:management.appointments.create />
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap mb-4">
        <table class="own-table w-100">
            <thead>
            <tr>
                <th class="text-center">{{ trans('dashboard.fields.number') }}</th>
                <th class="text-center">{{ trans('dashboard.sections.teacher') }}</th>
                <th class="text-center">{{ trans('dashboard.sections.service') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.start_time') }}</th>
                <th class="text-center">{{ trans('dashboard.sections.clients') }}</th>
                <th class="text-center">{{ trans('dashboard.sections.status') }}</th>
                <th class="text-center">{{ trans('dashboard.fields.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($appointments as $appointment)
                <tr wire:key="appointment-row-{{ $appointment->id }}">
                    <td class="text-center">{{ $appointment->number }}</td>
                    <td class="text-center">{{ $appointment->teacher?->fullname }}</td>
                    <td class="text-center">{{ $appointment->service->title }}</td>
                    <td class="text-center">{{ $appointment->getStartTime() }}</td>
                    <td class="text-center">{!! $appointment->getClients(true) !!}</td>
                    <td class="text-center">{!! $appointment->getAppointmentStatus() !!}</td>
                    <td class="text-center">
                        <a href="{{ route('dashboard.management.appointments.show', $appointment) }}" class="btn btn-sm btn-secondary text-white">
                            <i class="fa fa-eye"></i>
                        </a>
                        @if($appointment->isPending())
                            <livewire:management.appointments.reschedule :appointment="$appointment" :wire:key="'reschedule-appointment-id' . $appointment->id"  />
                            <livewire:management.appointments.cancel :appointment="$appointment" :wire:key="'cancel-appointment-id' . $appointment->id"  />
                            <livewire:management.appointments.update :appointment="$appointment" :wire:key="'update-appointment-id' . $appointment->id"  />
                        @endif
                        @if($appointment->isCanceled())
                            <livewire:management.appointments.restore :appointment="$appointment" :wire:key="'restore-appointment-id' . $appointment->id"  />
                            <livewire:management.appointments.force-delete :appointment="$appointment" :wire:key="'force-delete-appointment-id' . $appointment->id"  />
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-sections.fillers.pagination-navbar :data="$appointments" />
</div>
